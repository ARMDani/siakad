<?php

namespace App\Imports;

use App\Models\Subject_Course;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSubject_Course implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subject_Course([
            //
        ]);
    }
}
