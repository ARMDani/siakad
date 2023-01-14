<?php

namespace App\Exports;

use App\Models\Academic_Room;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoomExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Academic_Room::all();
    }
}
