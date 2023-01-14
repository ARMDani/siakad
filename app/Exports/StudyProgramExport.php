<?php

namespace App\Exports;

use App\Models\Study_Program;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudyProgramExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Study_Program::all();
    }
}
