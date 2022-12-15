<?php

namespace App\Exports;

use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class FacultyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Faculty::all();
    }
}

