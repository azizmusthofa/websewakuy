<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('ProfilSeeder');
        $this->call('IklanSeeder');
        $this->call('GambarSeeder');
        $this->call('UlasanSeeder');
        $this->call('PelaporanUserSeeder');
        $this->call('PelaporanIklanSeeder');
    }
}
