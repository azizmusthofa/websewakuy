<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 500; $i++){
            DB::table('gambars')->insert([
                'iklan_id' => $faker->numberBetween(1,120),
                'file' => $faker->numberBetween(1,10).'.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
