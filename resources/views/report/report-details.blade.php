@extends('layouts.mainlayout')

@section('title', 'Details')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
            Detail Pengaduan
        </h2>
        
        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
            
            <div>
                @foreach ($masyarakat as $item)
                    <h3>Nama : {{ $item->masyarakat->nama }}</h3>
                    <h3>Nik  : {{ $item->masyarakat->nik }}</h3>
                    <h3>Telp : {{ $item->masyarakat->telp }}</h3>
                    <h3>Tgl Pengaduan : {{ $item->created_at->format('l, d F Y - H:i:s') }}</h3>
                    <h3>Status : {{ $item->status }}</h3>
                @endforeach
            </div>
            <h1 class="text-center mb-8 font-semibold">Foto</h1>
            <div class="my-3 d-flex justify-content-center">
                @foreach ($report as $item)
                    <img width="500px" src="{{ asset('storage/foto/'.$item->foto) }}" />
                @endforeach
            </div>
            <div class="text-center flex-1 dark:text-gray-400">
                <h3 class="mb-8 font-semibold">Keterangan</h3>
                <p class="text-gray-800 dark:text-gray-400">
                    @foreach ($report as $item)
                        {{ $item->isi_laporan }}
                    @endforeach
                </p>
                <hr>
            <form action="/report-finished-detail/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-3">
                    <h3 class="mb-8 font-semibold">Tanggapan</h3>
                    <p class="text-gray-800 dark:text-gray-400">
                        @foreach ($report as $item)
                            {{ $item->tanggapan->tanggapan }}
                        @endforeach
                    </p>
                </div>
                
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-start my-2">
        <button class="btn btn-danger">Export To PDF</button>
    </div>
</main>
@endsection
