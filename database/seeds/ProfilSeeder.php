<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jk = ['Laki-laki', 'Perempuan'];
        $kota = ['Kota Malang', 'Kab. Malang', 'Kota Batu'];
        $faker = Faker::create('id_ID');
        for($i = 2; $i <= 20; $i++){
            DB::table('profils')->insert([
                'user_id' => $i,
        	    'jenis_kelamin' => $faker->randomElement($jk),
                'alamat' => $faker->address,
                'kota' => $faker->randomElement($kota),
                'telpon' => $faker->phoneNumber,
                'file' => 'profil.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
