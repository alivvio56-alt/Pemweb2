<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MahasiswaWebController extends Controller
{
    public function index()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->orderBy('nama')
            ->paginate(10);

        $daftarProgramStudi = ProgramStudi::orderBy('nama')->get();

        return view('mahasiswa.data', [
            'daftarMahasiswa' => $daftarMahasiswa,
            'daftarProgramStudi' => $daftarProgramStudi,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_studi_id' => [
                'required',
                'exists:program_studis,id'
            ],
            'nim' => [
                'required',
                'string',
                'max:20',
                'unique:mahasiswas,nim'
            ],
            'nama' => [
                'required',
                'string',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                'unique:mahasiswas,email'
            ],
            'angkatan' => [
                'required',
                'integer',
                'min:2000'
            ],
        ]);

        Mahasiswa::create($data);

        return redirect()
            ->route('mahasiswa.data')
            ->with(
                'sukses',
                'Data mahasiswa berhasil disimpan'
            );
    }

    public function show(string $nim)
{
    $mahasiswa = Mahasiswa::with([
        'programStudi',
        'matakuliah'
    ])
    ->where('nim', $nim)
    ->firstOrFail();

    return view('mahasiswa.show', [
        'mahasiswa' => $mahasiswa
    ]);
}

    /**
     * Tugas Praktikum no. 4
     *
     * Menampilkan sepuluh mahasiswa dengan IPK tertinggi
     * pada program studi Teknik Komputer (kode: TK)
     * menggunakan query Eloquent.
     */
    public function ipkTertinggi()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->whereHas('programStudi', function ($query) {
                $query->where('kode', 'TK');
            })
            ->orderByDesc('ipk')
            ->take(10)
            ->get();

        return view('mahasiswa.ipk-tertinggi', [
            'daftarMahasiswa' => $daftarMahasiswa
        ]);
    }
}