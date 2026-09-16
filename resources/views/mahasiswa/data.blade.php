@extends('layouts.app')

@section('judul', 'Data Mahasiswa')

@section('konten')

<h1 class="h3 mb-4">Data Mahasiswa</h1>

@if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $pesan)
                <li>{{ $pesan }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('mahasiswa.ipk-tertinggi') }}" class="btn btn-outline-primary btn-sm">
        Lihat IPK Tertinggi (Prodi TK)
    </a>
</div>

<x-kartu-info judul="Tambah Data Mahasiswa">
    <form method="POST" action="{{ route('mahasiswa.store') }}" class="row g-2">
        @csrf

        <div class="col-md-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="col-md-2">
            <label class="form-label">Angkatan</label>
            <input type="number" name="angkatan" class="form-control" value="{{ old('angkatan', date('Y')) }}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label">Program Studi</label>
            <select name="program_studi_id" class="form-select" required>
                @foreach ($daftarProgramStudi as $programStudi)
                    <option value="{{ $programStudi->id }}" @selected(old('program_studi_id') == $programStudi->id)>
                        {{ $programStudi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-9 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</x-kartu-info>

<table class="table table-striped bg-white">

    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($daftarMahasiswa as $mahasiswa)

        <tr>
            <td>
                <a href="{{ route('mahasiswa.show', $mahasiswa->nim) }}">
                    {{ $mahasiswa->nim }}
                </a>
            </td>

            <td>{{ $mahasiswa->nama }}</td>

            <td>{{ $mahasiswa->programStudi->nama }}</td>

            <td>{{ $mahasiswa->angkatan }}</td>

            <td>{{ $mahasiswa->ipk }}</td>
        </tr>

    @endforeach

</tbody>

</table>

{{ $daftarMahasiswa->links() }}

@endsection