<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            // Jawa Barat (id = 1)
            ['province_id' => 1, 'name' => 'Bandung'],
            ['province_id' => 1, 'name' => 'Cianjur'],
            ['province_id' => 1, 'name' => 'Bogor'],

            // Jawa Tengah (id = 2)
            ['province_id' => 2, 'name' => 'Semarang'],
            ['province_id' => 2, 'name' => 'Solo'],

            // DKI Jakarta (id = 3)
            ['province_id' => 3, 'name' => 'Jakarta Selatan'],
            ['province_id' => 3, 'name' => 'Jakarta Utara'],
        ]);
    }
}
