<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'),
            'nama_lengkap' => 'administrator',
            'id_pangkat' => null,
            'id_jabatan' => Jabatan::where('nama_jabatan', 'admin')->first()->id ?? null,
            'nrp' => null,
            'nomor_telepon' => null,
        ]);

        User::create([
            'name' => 'danramil',
            'email' => 'danramil@admin.com',
            'password' => bcrypt('12345'),
            'nama_lengkap' => 'danramil',
            'id_pangkat' => null,
            'id_jabatan' => Jabatan::where('nama_jabatan', 'danramil')->first()->id ?? null,
            'nrp' => null,
            'nomor_telepon' => null,
        ]);

        User::create([
            'name' => 'babinsa',
            'email' => 'babinsa@admin.com',
            'password' => bcrypt('12345'),
            'nama_lengkap' => 'babinsa',
            'id_pangkat' => null,
            'id_jabatan' => Jabatan::where('nama_jabatan', 'babinsa')->first()->id ?? null,
            'nrp' => null,
            'nomor_telepon' => null,
        ]);
    }
}