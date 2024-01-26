<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\KotaSeeder;
use Laravolt\Indonesia\Seeds\DesaSeeder;
use Laravolt\Indonesia\Seeds\KecamatanSeeder;
use Laravolt\Indonesia\Seeds\ProvinsiSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PangkatSeeder::class,
            JabatanSeeder::class,
            UserSeeder::class
        ]);

        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
        ]);
    }
}
