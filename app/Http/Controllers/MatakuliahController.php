<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $kataKunci = $request->query('q', '');

        $daftarMatakuliah = Matakuliah::query()
            ->when($kataKunci !== '', function ($query) use ($kataKunci) {
                $query->where(function ($sub) use ($kataKunci) {
                    $sub->where('kode', 'like', "%{$kataKunci}%")
                        ->orWhere('nama', 'like', "%{$kataKunci}%");
                });
            })
            ->orderBy('nama')
            ->get();

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah,
            'kataKunci' => $kataKunci
        ]);
    }

    public function show(string $kode)
    {
        $matakuliah = Matakuliah::where('kode', $kode)->firstOrFail();

        return view('matakuliah.show', [
            'matakuliah' => $matakuliah
        ]);
    }
}
