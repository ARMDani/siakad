<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {

            DB::table('student')->insert([
                'name' => $faker->name,
                'nim' => $faker->numberBetween(21916105, 21916150),
                'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'religion' => $faker->randomElement(['Islam', 'Hindu', 'Kristen', 'Protestan', 'Katolik', 'Budha', 'Konghucu']),
                'study_program_id' => $faker->numberBetween(1, 2),
                'districts_id' => $faker->numberBetween(1, 1),
                'class_id' => 1,
                'generations_id' => $faker->numberBetween(1, 2),
                'photo' =>  $faker->name,
                'created_by' => $faker->numberBetween(1, 1),
                'updated_by' => $faker->numberBetween(1, 1),
                'created_at' =>$faker->dateTime($max = 'now', $timezone = null), 
                'updated_at' =>$faker->dateTime($max = 'now', $timezone = null),
                'deleted_at' =>$faker->dateTime($max = 'now', $timezone = null)


                // 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                // 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                // 'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
