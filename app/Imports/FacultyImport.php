<?php

namespace App\Imports;

use App\Models\Faculty;

use Maatwebsite\Excel\Concerns\ToModel;

class FacultyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faculty([
            'code_faculty' =>$row[1],
            'name' =>$row[2],
        ]);
    }
}
