<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            Grade::class,
            ValueinputimeSeeder::class,
            AcademicYearSeeder::class,
            Roles::class,
            UserData::class,
            ClassSeeader::class,
            DistrictsSeeader::class,
            FacultySeeader::class,
            GenerationsSeeader::class,
            StudiprogramSeeader::class,
            StudentSeeder::class,
            
        ]);
    }
}
