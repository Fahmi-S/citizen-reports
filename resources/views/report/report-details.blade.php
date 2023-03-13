@extends('layouts.mainlayout')

@section('title', 'Details')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
            Detail Pengaduan
        </h2>
        
        @if (Auth::guard('admin')->user()->level == 'admin')
            <div class="d-flex justify-content-center my-2">
                <button class="btn btn-danger">Export To PDF</button>
            </div>
        @else
        
        @endif
        
        <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <hr>
            <div>
                @foreach ($report as $item)
                    <h3>Nama : {{ $item->masyarakat->nama }}</h3>
                    <h3>Nik  : {{ $item->masyarakat->nik }}</h3>
                    <h3>Telp : {{ $item->masyarakat->telp }}</h3>
                    <h3>Tgl Pengaduan : {{ $item->created_at->format('l, d F Y - H:i:s') }}</h3>
                    <h3>Status : {{ $item->status = 'Selesai' }}</h3>
                @endforeach
            </div>
            <hr>
            <h1 class="text-center mb-8 font-semibold">Foto</h1>
            <div class="my-3 d-flex justify-content-center">
                @foreach ($report as $item)
                    <img width="500px" src="{{ asset('storage/foto/'.$item->foto) }}" />
                @endforeach
            </div>
            <div class="text-center flex-1 dark:text-gray-400">
                <h3 class="mb-8 font-semibold">Isi Laporan</h3>
                <div class="bg-white">
                    <p>
                        @foreach ($report as $item)
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-10 col-xl-8">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <p class="mt-3 pb-2 fw-bold">
                                            Masyarakat
                                        </p>
                                        <hr>
                                        <p class="mt-3 mb-4 pb-2">
                                            {{ $item->isi_laporan }}
                                        </p>
                                        <small>
                                            {{ $item->created_at->format('l, d F Y - H:i:s') }}
                                        </small>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </p>
                </div>
                <hr>
                    <h3 class="mb-8 font-semibold">Tanggapan</h3>
                    <p class="text-gray-800 dark:text-gray-400">
                        @foreach ($report as $item)
                        @foreach ($item->tanggapan as $ite)
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-10 col-xl-8">
                                <div class="card my-3">
                                    <div class="card-body">
                                        <p class="mt-3 pb-2 fw-bold">
                                            Petugas
                                        </p>
                                        <hr>
                                        <p class="mt-3 mb-4 pb-2">
                                            {{ $ite->tanggapan }}
                                        </p>
                                        <small>
                                            {{ $ite->created_at->format('l, d F Y - H:i:s') }}
                                        </small>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                    </p>
                </div>
            <hr>
            <div class="my-3 d-flex justify-content-center">
                <a href="/report-finished-list" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
    <br>
</main>
@endsection
