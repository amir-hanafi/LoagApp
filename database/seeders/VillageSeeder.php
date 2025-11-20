<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageSeeder extends Seeder
{
    public function run()
    {
        DB::table('villages')->insert([

    // Cicendo (district_id = 1)
    ['district_id' => 1, 'name' => 'Cicendo Wetan'],
    ['district_id' => 1, 'name' => 'Sukamiskin'],

    // Bandung Wetan (district_id = 2)
    ['district_id' => 2, 'name' => 'Lebakgede'],
    ['district_id' => 2, 'name' => 'Citarum'],

    // Cianjur (district_id = 3)
    ['district_id' => 3, 'name' => 'Sayang'],
    ['district_id' => 3, 'name' => 'Cikalong'],

    // Sukaluyu (district_id = 4)
    ['district_id' => 4, 'name' => 'Sukaluyu Tengah'],
    ['district_id' => 4, 'name' => 'Sukamaju'],

    // Bogor Selatan (district_id = 5)
    ['district_id' => 5, 'name' => 'Cibuluh'],
    ['district_id' => 5, 'name' => 'Tanah Sareal'],

    // Bogor Timur (district_id = 6)
    ['district_id' => 6, 'name' => 'Cimahpar'],
    ['district_id' => 6, 'name' => 'Katulampa'],

    // Semarang Tengah (district_id = 7)
    ['district_id' => 7, 'name' => 'Kedungmundu'],
    ['district_id' => 7, 'name' => 'Peterongan'],

    // Semarang Barat (district_id = 8)
    ['district_id' => 8, 'name' => 'Krobokan'],
    ['district_id' => 8, 'name' => 'Tlogosari'],

    // Pasar Kliwon (district_id = 9)
    ['district_id' => 9, 'name' => 'Sangkrah'],
    ['district_id' => 9, 'name' => 'Joyosuran'],

    // Banjarsari (district_id = 10)
    ['district_id' => 10, 'name' => 'Kestalan'],
    ['district_id' => 10, 'name' => 'Gajahan'],

    // Kebayoran Baru (district_id = 11)
    ['district_id' => 11, 'name' => 'Cipete Selatan'],
    ['district_id' => 11, 'name' => 'Melawai'],

    // Cilandak (district_id = 12)
    ['district_id' => 12, 'name' => 'Lebak Bulus'],
    ['district_id' => 12, 'name' => 'Cilandak Barat'],

    // Tanjung Priok (district_id = 13)
    ['district_id' => 13, 'name' => 'Sunter'],
    ['district_id' => 13, 'name' => 'Koja'],

    // Kelapa Gading (district_id = 14)
    ['district_id' => 14, 'name' => 'Pegangsaan Dua'],
    ['district_id' => 14, 'name' => 'Kelapa Gading Barat'],

]);

    }
}
