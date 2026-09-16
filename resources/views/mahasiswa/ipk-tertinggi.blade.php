@extends('layouts.app')

@section('judul', '10 Mahasiswa IPK Tertinggi - Teknik Komputer')

@section('konten')

<h1 class="h3 mb-4">
    10 Mahasiswa dengan IPK Tertinggi &mdash; Program Studi Teknik Komputer
</h1>

<x-kartu-info judul="Tugas Praktikum No. 4">
    Data berikut dihasilkan menggunakan query Eloquent:
    <code>Mahasiswa::whereHas('programStudi', fn($q) => $q->where('kode', 'TK'))->orderByDesc('ipk')->take(10)->get()</code>
</x-kartu-info>

<table class="table table-bordered bg-white">

    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($daftarMahasiswa as $index => $mahasiswa)

            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    <a href="{{ route('mahasiswa.show', $mahasiswa->nim) }}">
                        {{ $mahasiswa->nim }}
                    </a>
                </td>

                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->programStudi->nama }}</td>
                <td>{{ $mahasiswa->angkatan }}</td>
                <td><strong>{{ $mahasiswa->ipk }}</strong></td>
            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Belum ada mahasiswa pada program studi Teknik Komputer.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">
    Kembali
</a>

@endsection
