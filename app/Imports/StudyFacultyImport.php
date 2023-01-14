<?php

namespace App\Imports;

use App\Models\Study_Faculty;
use Maatwebsite\Excel\Concerns\ToModel;

class StudyFacultyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1] ){

        }
        
        return new Study_Faculty([
            'code_faculty' => $row[1],
            'name' => $row[2],
            'created_by' => $row[3],
            'updated_by' => $row[4],
        ]);
    }
}
