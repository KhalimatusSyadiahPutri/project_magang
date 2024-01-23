<?php

namespace Database\Seeders;

use App\Models\Pangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pangkat::create(['nama_pangkat'=> 'Pangkat 1']);
        Pangkat::create(['nama_pangkat'=> 'Pangkat 2']);
        Pangkat::create(['nama_pangkat'=> 'Pangkat 3']);
    }
}