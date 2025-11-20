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
    ['city_id' => 1, 'name' => 'Cicendo'],
    ['city_id' => 1, 'name' => 'Bandung Wetan'],

    // Cianjur (city_id = 2)
    ['city_id' => 2, 'name' => 'Cianjur'],
    ['city_id' => 2, 'name' => 'Sukaluyu'],

    // Bogor (city_id = 3)
    ['city_id' => 3, 'name' => 'Bogor Selatan'],
    ['city_id' => 3, 'name' => 'Bogor Timur'],

    // Semarang (city_id = 4)
    ['city_id' => 4, 'name' => 'Semarang Tengah'],
    ['city_id' => 4, 'name' => 'Semarang Barat'],

    // Solo / Surakarta (city_id = 5)
    ['city_id' => 5, 'name' => 'Pasar Kliwon'],
    ['city_id' => 5, 'name' => 'Banjarsari'],

    // Jakarta Selatan (city_id = 6)
    ['city_id' => 6, 'name' => 'Kebayoran Baru'],
    ['city_id' => 6, 'name' => 'Cilandak'],

    // Jakarta Utara (city_id = 7)
    ['city_id' => 7, 'name' => 'Tanjung Priok'],
    ['city_id' => 7, 'name' => 'Kelapa Gading'],
]);

    }
}
