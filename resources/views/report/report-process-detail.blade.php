@extends('layouts.mainlayout') 

@section('title', 'Report Detail')

@section('content')
    <h2 class="text-center">
        Report Details
    </h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h1 class="text-center mb-8 font-semibold">Foto</h1>
        <div class="my-3 d-flex justify-content-center">
            @foreach ($report as $item)
                <img width="500px" src="{{ asset('storage/foto/'.$item->foto) }}" />
            @endforeach
        </div>
        <div class="text-center flex-1 dark:text-gray-400">
            <h1 class="mb-8 font-semibold">Keterangan</h1>
            <p class="text-gray-800 dark:text-gray-400">
                @foreach ($report as $item)
                    {{ $item->isi_laporan }}
                @endforeach
            </p>
            <hr>
            <div class="my-3">
                <a href="/report-list" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection