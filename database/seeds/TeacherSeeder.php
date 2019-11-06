<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $teacher_data = [
            [
                'name' => 'Pak Dani',
                'email' => $faker->email,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bu Dar',
                'email' => $faker->email,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pak Zul',
                'email' => $faker->email,
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('teachers')->insert($teacher_data);
    }
}
