<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all(['id', 'full_name', 'phone', 'email', 'message']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Full Name',
            'Phone',
            'Email',
            'Message',
        ];
    }
}
