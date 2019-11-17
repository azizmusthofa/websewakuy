<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class IklanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * str_random(10)
     * @return void
     */
    public function run()
    {
        //$pemilik = User::all();
        $kategori = ['Kendaraan', 'Elektronik', 'Alat Pesta'];
        $status = ['Tersedia', 'Disewa'];
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 120; $i++){
            DB::table('iklans')->insert([
                'user_id' => $faker->numberBetween(1,20),
                'kategori' => $faker->randomElement($kategori),
                'nama_barang' => 'Produk '.$i,
        	    'harga_sewa' => $faker->numberBetween(30000,50000),
                'deskripsi' => $faker->paragraph,
                'status' => $faker->randomElement($status),
                'suka' => $faker->numberBetween(5,20),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
