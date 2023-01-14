<?php

namespace App\Exports;

use App\Models\Subject_Course;
use Maatwebsite\Excel\Concerns\FromCollection;

class subject_courseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subject_Course::all();
    }
}
