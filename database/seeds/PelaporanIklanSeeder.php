<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PelaporanIklanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 360; $i++) {
            DB::table('pelaporan_iklans')->insert([
                'iklan_id' => $faker->numberBetween(1, 120),
                'pelapor_id' => $faker->numberBetween(1, 20),
                'alasan' => 'Gak tau, gak ngerti, gak sadar',
                'keterangan' => 'Tidak Ada',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
