<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Contoh: membuat 1 user untuk testing
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seeder untuk provinsi & kota
        $this->call([
            ProvinceSeeder::class,
            CitySeeder::class,
        ]);
    }
}
