<?php

namespace App\Imports;

use App\Models\Academic_Room;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAcademic_Room implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Academic_Room([
            'name' => $row[0],
            'code_room' => $row[1],
        ]);
    }
}
