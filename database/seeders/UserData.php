<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'username' => 'administrtor',
            'password' => bcrypt ('pass12345'),
            'email' => 'admin@gmail.com',
            'email_verifed_at' => date('Y-m-d H:i:s'),
            'roles_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'admin prodi',
            'username' => 'prodi',
            'password' => bcrypt ('pass12345'),
            'email' => 'prodi@gmail.com',
            'email_verifed_at' => date('Y-m-d H:i:s'),
            'roles_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'dosen',
            'username' => 'dosen',
            'password' => bcrypt ('pass12345'),
            'email' => 'dosen@gmail.com',
            'email_verifed_at' => date('Y-m-d H:i:s'),
            'roles_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'mahasiswa',
            'username' => 'mahasiswa',
            'password' => bcrypt ('pass12345'),
            'email' => 'mahasiswa@gmail.com',
            'email_verifed_at' => date('Y-m-d H:i:s'),
            'roles_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
    }
   
}