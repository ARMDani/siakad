<?php

namespace App\Imports;

use App\Models\Study_Program;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStudy_Program implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Study_Program([
            //
        ]);
    }
}
