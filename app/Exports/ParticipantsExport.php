<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dont need to show the code and image in the excel
        $participants = Participant::all()->makeHidden(['code', 'image']);
        return $participants->map(function ($participant) {

            $participant->info_session_id = $participant->infoSession->formation . " " . $participant->infoSession->name;
            $participant->current_step = ucwords(str_replace('_', ' ', $participant->current_step));
            $participant->is_visited = $participant->is_visited ? "Came to Info Session" : "Did not Come to Info Session";

            return $participant;
        });
    }


    public function headings(): array
    {
        return [
            'ID',
            'Session',
            'Full Name',
            'Email',
            'Birthday',
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
}
