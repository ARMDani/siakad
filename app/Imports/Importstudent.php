<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class Importstudent implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'nim' => $row[1],
            'gender' => $row[2],
            'religion' => $row[3],
            'study_program_id' => $row[4],
            'districts_id' => $row[5],
            'class_id' => $row[6],
            'generations_id' => $row[7],
            'photo' => $row[8],
        ]);
    }
}
