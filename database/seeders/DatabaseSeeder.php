<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProgramStudiSeeder::class,
            MatakuliahSeeder::class,
        ]);

        Mahasiswa::factory()->count(30)->create();

        $mahasiswa = Mahasiswa::all();
        $matakuliah = Matakuliah::all();

        foreach ($mahasiswa as $mhs) {
            $pilihan = $matakuliah
                ->random(rand(2, 4))
                ->pluck('id')
                ->toArray();

            $dataPivot = [];

            foreach ($pilihan as $matakuliahId) {
                $dataPivot[$matakuliahId] = [
                    'nilai' => fake()->randomFloat(2, 65, 100),
                ];
            }

            $mhs->matakuliah()->sync($dataPivot);
        }
    }
}