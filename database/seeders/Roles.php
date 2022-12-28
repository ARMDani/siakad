<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'admin'],
            ['name' => 'prodi'],
            ['name' => 'dosen'],
            ['name' => 'mahasiswa'],

        ];
        foreach ($data as $value){
            Role::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
        // DB::table('roles')->insert([
        //     'name' => 'Admin Akademik',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'Admin Prodi',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'Dosen',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'Mahasiswa',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
        // DB::table('roles')->insert([
        //     'name' => 'Rektor',
        //     'created_by' => 1,
        //     'updated_by' => 1,
        // ]);
    
}
