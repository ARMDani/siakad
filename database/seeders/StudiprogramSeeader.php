<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudiprogramSeeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('study_program')->insert([
        //     'code_prodi' => 22222,
        //     'name' => 'Pendidikan Teknologi Informasi',
        //     'study_faculty_id' => 1,
        //     'created_by' => 1,
        //     'updated_by' => 1,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        //     'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
        DB::table('study_program')->insert([
            'code_prodi' => 22223,
            'name' => 'Administrasi',
            'study_faculty_id' => 1,
            'created_by' => 2,
            'updated_by' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_program')->insert([
            'code_prodi' => 22224,
            'name' => 'Kimia',
            'study_faculty_id' => 1,
            'created_by' => 3,
            'updated_by' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
