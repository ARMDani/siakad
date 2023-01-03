<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Grade extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade')->insert([
            'name' => 'A',
            'bobot' => 4.00,
            'poin' => 'Poin 86-100',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'A-',
            'bobot' => 3.67,
            'poin' => 'Poin 80-85',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'B+',
            'bobot' => 3.33,
            'poin' => 'Poin 76-80',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'B',
            'bobot' => 3.00,
            'poin' => 'Poin 71-75',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'B-',
            'bobot' => 2.67,
            'poin' => 'Poin 66-70',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'C+',
            'bobot' => 2.33,
            'poin' => 'Poin 61-65',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'C',
            'bobot' => 2.00,
            'poin' => 'Poin 56-60',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'D',
            'bobot' => 1.00,
            'poin' => 'Poin 41-55',
            'keterangan' => 'LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('grade')->insert([
            'name' => 'E',
            'bobot' => 0.00,
            'poin' => 'Poin 0-40',
            'keterangan' => 'TIDAK LULUS',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
