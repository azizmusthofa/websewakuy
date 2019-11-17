<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 250; $i++){
            DB::table('ulasans')->insert([
                'iklan_id' => $faker->numberBetween(1,30),
                'nama' => $faker->name,
                'email' => $faker->email,
                'isi' => $faker->paragraph,
                'rating' => $faker->numberBetween(1,5),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}