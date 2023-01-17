<?php

namespace App\Imports;

use App\Models\Study_Faculty;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportFakulti implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Study_Faculty([
            'code_faculty' => $row[0],
            'name' => $row[1],
        ]);
    }
}
