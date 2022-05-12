<?php

namespace App\Exports;

use App\Models\Encadrant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NotesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Encadrant::all();
        return collect(Encadrant::getNotes());
    }

    public function headings():array{
        return[
            'stage_id',
            'prenom',
            'nom',
            'note'
        ];
            
    }
}
