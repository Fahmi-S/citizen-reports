@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<h2>Apakah anda yakin menghapus petugas : {{ $petugas->nama_petugas }}</h2>
<div class="mt-5">
    <a href="/petugas-destroy/{{ $petugas->slug }}" class="btn btn-danger me-2">Ya</a>
    <a href="/petugas-list" class="btn btn-primary">Batal</a>
</div>
@endsection