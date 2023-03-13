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
        <hr>
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
            <div class="bg-white">
                <p>
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
                                        @if ($ite->tanggapan == '')
                                            <p class="mt-3 mb-4 pb-2">
                                                Belum Ditanggapi!
                                            </p>
                                        @else
                                            <p class="mt-3 mb-4 pb-2">
                                                {{ $ite->tanggapan }}
                                            </p>
                                            <small>
                                                {{ $ite->created_at->format('l, d F Y - H:i:s') }}
                                            </small>
                                        @endif
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
            <div class="my-3">
                <a href="/report-list" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
    <div>
        <br>
    </div>
@endsection