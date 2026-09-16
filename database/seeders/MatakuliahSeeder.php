<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $daftar = [
            [
                'kode' => 'WEB2',
                'nama' => 'Pemrograman Web II',
                'sks' => 3,
                'semester' => 4,
            ],
            [
                'kode' => 'JARKOM',
                'nama' => 'Jaringan Komputer',
                'sks' => 3,
                'semester' => 4,
            ],
            [
                'kode' => 'OS',
                'nama' => 'Sistem Operasi',
                'sks' => 3,
                'semester' => 4,
            ],
            [
                'kode' => 'MIKRO',
                'nama' => 'Mikrokontroler',
                'sks' => 3,
                'semester' => 4,
            ],
            [
                'kode' => 'PROBSTAT',
                'nama' => 'Probabilitas dan Statistik',
                'sks' => 3,
                'semester' => 4,
            ],
        ];

        foreach ($daftar as $item) {
            Matakuliah::create($item);
        }
    }
}