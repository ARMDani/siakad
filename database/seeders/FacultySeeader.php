<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('study_faculty')->insert([
        //     'code_faculty' => 11111,
        //     'name' => 'FKIP',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
        DB::table('study_faculty')->insert([
            'code_faculty' => 11111,
            'name' => 'Fakultas Teknik',
            'created_by' => 2,
            'updated_by' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
