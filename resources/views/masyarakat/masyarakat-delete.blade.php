@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h3>Apakah kamu yakin akan menghapus data masyarakat : {{ $masyarakat->nama}}</h1>    

    <div class="mt-5">
        <a href="/masyarakat-destroy/{{ $masyarakat->slug }}" class="btn btn-danger me-2">Ya</a>
        <a href="/masyarakat-list" class="btn btn-primary">Batal</a>
    </div>
@endsection