<?php

namespace App\Exports;

use App\Models\FrequentQuestion;
use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QuestionsExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    $participants = Participant::whereNotIn('current_step', ['info_session', 'interview'])
        ->with('questions')
        ->get();
    //dd($participants);

    $data = $participants->map(function ($participant,$idx) {
        return [
            $idx + 1,
            $participant->full_name,
            optional($participant->questions)->mode_of_transportation,
            optional($participant->questions)->living_situation,
            optional($participant->questions)->where_have_you_heard_of_lionsgeek,
            optional($participant->questions)->academic_background,
            optional($participant->questions)->professional_experience,
            optional($participant->questions)->interest_in_joining_lionsgeek,
            optional($participant->questions)->technical_skills,
            optional($participant->questions)->profeciency_in_french,
            optional($participant->questions)->profeciency_in_english,
            optional($participant->questions)->strengths,
            optional($participant->questions)->weaknesses,
            optional($participant->questions)->do_you_have_a_laptop,
            optional($participant->questions)->available_all_week,
        ];
    });

    return $data;
}


public function headings(): array
{
    return [
        "Id",
        "Full Name",
        'Mode Of Transportation',
        'Living Situation',
        'Where Have You Heard Of Lionsgeek',
        'Academic Background',
        'Professional Experience',
        'Interest In Joining Lionsgeek',
        'Technical Skills',
        'Profeciency In French',
        'Profeciency In English',
        'Strengths',
        'Weaknesses',
        'Do You Have A Laptop',
        'Available All Week',
    ];
}
public function styles(Worksheet $sheet)
    {
        return [

            1 => ['font' => ['bold' => true]],

            'A' => ['font' => ['bold' => true]],
        ];
    }

}
