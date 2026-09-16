@extends('layouts.app')

@section('judul', 'Detail Mata Kuliah')

@section('konten')

<h1 class="h3 mb-4">Detail Mata Kuliah</h1>

<div class="card">

    <div class="card-header">
        Informasi Mata Kuliah
    </div>

    <div class="card-body">

        <p>
            <strong>Kode:</strong>
            {{ $matakuliah['kode'] }}
        </p>

        <p>
            <strong>Nama:</strong>
            {{ $matakuliah['nama'] }}
        </p>

        <p>
            <strong>SKS:</strong>
            <x-badge-sks :sks="$matakuliah['sks']" />
        </p>

        <a
            href="{{ route('matakuliah.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection