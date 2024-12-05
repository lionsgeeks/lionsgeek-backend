<?php

namespace App\Exports;

use App\Models\Coworking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CoworkingsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $url = "https://backend.mylionsgeek.ma/storage/";
        return Coworking::all()->map(function ($cow) use ($url) {
            $cow->cv = $url . $cow->cv;
            $cow->presentation = $url . $cow->presentation;
            $cow->reasons = ucwords(str_replace('-', ' ', $cow->reasons));


            return $cow;
        });
    }



    public function headings(): array
    {
        return [
            'ID',
            'Full Name',
            'Email',
            'Phone',
            'Birthday',
            'Formation',
            'CV',
            'Project Name',
            'Project Description',
            'Domain',
            'Plan',
            'Presentation',
            'Previous Project',
            'How They Find LionsGeek',
            'Needs',
            'Gender',
            'Created At',
            'Updated At',
        ];
    }
}
