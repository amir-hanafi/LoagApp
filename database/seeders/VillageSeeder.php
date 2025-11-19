<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillageSeeder extends Seeder
{
    public function run()
    {
        DB::table('villages')->insert([

            // Coblong (district_id = 1)
            ['district_id' => 1, 'name' => 'Dago'],
            ['district_id' => 1, 'name' => 'Lebak Gede'],

            // Cicendo
            ['district_id' => 2, 'name' => 'Pamoyanan'],
            ['district_id' => 2, 'name' => 'Husen Sastranegara'],

            // Kebayoran Baru (district_id = 6)
            ['district_id' => 6, 'name' => 'Gandaria Utara'],
            ['district_id' => 6, 'name' => 'Gunung'],

        ]);
    }
}
