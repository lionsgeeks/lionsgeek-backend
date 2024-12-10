<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParticipantsExport implements FromQuery, WithHeadings, WithMapping
{

    use Exportable;

    public $term;
    public $step;
    public $sessionID;


    public function __construct($term, $step, $sessionID)
    {
        $this->term = $term;
        $this->step = $step;
        $this->sessionID = $sessionID;
    }


    public function query()
    {
        $query = Participant::query();

        if (!empty($this->term)) {
            $query->where('full_name', 'like', '%' . $this->term . '%');
            $query->orWhere('email', 'like', '%' . $this->term . '%');
            $query->orWhere('phone', 'like', '%' . $this->term . '%');
        }

        if (!empty($this->step)) {
            $query->orWhere('current_step', 'like', '%' . $this->step . '%');
        }

        if (!empty($this->sessionID)) {
            $query->orWhere('info_session_id', 'like', '%' . $this->sessionID . '%');
        }

        return $query;
    }



    public function headings(): array
    {
        return [
            'ID',
            'Session',
            'Full Name',
            'Email',
            'Birthday',
            'Age',
            'Phone',
            'City',
            'Prefecture',
            'Gender',
            'Motivation',
            'How They Found LionsGeek',
            'Current Step',
            'Have Visited',
            "Created At",
            "Updated At"
        ];
    }

    // Map method to transform data before export
    public function map($participant): array
    {
        return [
            $participant->id,
            $participant->infoSession->formation . " " . $participant->infoSession->name,
            $participant->full_name,
            $participant->email,
            $participant->birthday,
            $participant->age,
            $participant->phone,
            ucwords($participant->city),
            ucwords(str_replace('_', ' ', $participant->prefecture)),
            ucwords($participant->gender),
            $participant->motivation,
            $participant->source,
            ucwords(str_replace('_', ' ', $participant->current_step)),
            $participant->is_visited ? "Came to Info Session" : "Did not Come to Info Session",
            $participant->created_at,
            $participant->updated_at,
        ];
    }
}
