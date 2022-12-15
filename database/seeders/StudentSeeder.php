<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert([
            'name' => 'irma',
            'nim' => 21916103,
            'gender' => 'Perempuan',
            'religion' => 'Islam',
            'study_program_id' => 1,
            'districts_id' => 1,
            'class_id' => 5,
            'generations_id' => 1,
            'photo' => 'irma',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
