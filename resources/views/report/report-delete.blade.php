@extends('layouts.mainlayout')

@section('title', 'Delete Confirm')

@section('content')
<div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
<h2>Apakah anda yakin menghapus Pengaduan :</h2>
    <div>
        <h3>ID : {{ $report->id }}</h3>
        <h3>Tanggal Pengaduan : {{ $report->tgl_pengaduan }}</h3>
        <h3>Nik : {{ $report->nik }}</h3>
        <h3>Isi Laporan : {{ $report->isi_laporan }}</h3>
        <h3 class="text-center mb-8 font-semibold">Foto : </h3>
        <div class="my-3 d-flex justify-content-center">
            <img width="300px" src="{{ asset('storage/foto/'.$report->foto) }}" />
        </div>
        <h3>Status : {{ $report->status }}</h3>
    </div>
    <div class="mt-5">
        <a href="/report-destroy/{{ $report->id }}" class="btn btn-danger me-2">Ya</a>
        <a href="/report-list" class="btn btn-primary">Batal</a>
    </div>
</div>
@endsection