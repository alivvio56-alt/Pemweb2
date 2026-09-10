<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $daftarMatakuliah = [
            [
                'kode' => 'IF101',
                'nama' => 'Pemrograman Web II',
                'sks' => 3
            ],
            [
                'kode' => 'TK201',
                'nama' => 'Jaringan Komputer',
                'sks' => 2
            ],
            [
                'kode' => 'TK202',
                'nama' => 'Sistem Operasi',
                'sks' => 3
            ],
            [
                'kode' => 'TK203',
                'nama' => 'Mikrokontroler',
                'sks' => 2
            ],
            [
                'kode' => 'TK204',
                'nama' => 'Manajemen Proyek',
                'sks' => 3
            ],
        ];

        $kataKunci = $request->query('q', '');

        if ($kataKunci !== '') {
            $daftarMatakuliah = array_filter(
                $daftarMatakuliah,
                function ($matakuliah) use ($kataKunci) {
                    return str_contains(
                        strtolower($matakuliah['kode']),
                        strtolower($kataKunci)
                    )
                    ||
                    str_contains(
                        strtolower($matakuliah['nama']),
                        strtolower($kataKunci)
                    );
                }
            );
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah,
            'kataKunci' => $kataKunci
        ]);
    }

    public function show(string $kode)
    {
        $daftarMatakuliah = [
            [
                'kode' => 'IF101',
                'nama' => 'Pemrograman Web II',
                'sks' => 3
            ],
            [
                'kode' => 'TK201',
                'nama' => 'Jaringan Komputer',
                'sks' => 2
            ],
            [
                'kode' => 'TK202',
                'nama' => 'Sistem Operasi',
                'sks' => 3
            ],
            [
                'kode' => 'TK203',
                'nama' => 'Mikrokontroler',
                'sks' => 2
            ],
            [
                'kode' => 'TK204',
                'nama' => 'Manajemen Proyek',
                'sks' => 3
            ],
        ];

        $matakuliah = collect($daftarMatakuliah)
            ->firstWhere('kode', $kode);

        if ($matakuliah === null) {
            abort(404);
        }

        return view('matakuliah.show', [
            'matakuliah' => $matakuliah
        ]);
    }
}