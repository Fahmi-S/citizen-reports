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
            <h3 class="mb-8 font-semibold">Isi Pengaduan</h1>
            <p class="text-gray-800 dark:text-gray-400">
                @foreach ($report as $item)
                    {{ $item->isi_laporan }}
                @endforeach
            </p>
            <hr>
            <h3 class="mb-8 font-semibold">Tanggapan</h3>
            <p>
                @foreach ($report as $item)
                    {{$item->tanggapan->tanggapan}}
                @endforeach
            </p>
            <hr>
            <form action="/report-finished-detail/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-3">
                    <label for="floatingInput" class="fs-4 semi-bold">Isi Tanggapan Terbaru</label>
                    <textarea name="tanggapan" id="floatingInput" rows="3" class="form-control" placeholder="Silahkan Isi Tanggapan Petugas..."></textarea>
                </div>
                <div class="my-3">
                    <select name="status" class="form-control">
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/report-process-list" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection