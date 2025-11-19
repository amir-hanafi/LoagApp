<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        DB::table('districts')->insert([
            // Bandung (city_id = 1)
            ['city_id' => 1, 'name' => 'Coblong'],
            ['city_id' => 1, 'name' => 'Cicendo'],
            ['city_id' => 1, 'name' => 'Sukasari'],

            // Cianjur
            ['city_id' => 2, 'name' => 'Cianjur Kota'],
            ['city_id' => 2, 'name' => 'Ciranjang'],

            // Jakarta Selatan (city_id = 6)
            ['city_id' => 6, 'name' => 'Kebayoran Baru'],
            ['city_id' => 6, 'name' => 'Mampang Prapatan'],
        ]);
    }
}
