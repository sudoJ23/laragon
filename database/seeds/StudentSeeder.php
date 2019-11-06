<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        $nomor = "0032158918";
        foreach (range(1, 50) as $index) {
            DB::table('students')->insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'nisn' => $nomor,
                'created_at' => date('Y-m-d H:i:s'),
                'email' => $faker->email
            ]);
            $nomor++;
        }
    }
}
