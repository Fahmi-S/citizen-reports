@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h3 class="text-center">Petugas List</h3>
    <div class="d-flex justify-content-center">
        <a href="petugas-add" class="btn btn-primary">+ Tambah Data</a>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a href="petugas-deleted" class="btn btn-secondary">- View Deleted Data</a>
    </div>

    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    
    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_petugas}}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <a href="petugas-edit/{{ $item->slug }}" class="btn btn-info">Edit</a>
                            <a href="petugas-delete/{{ $item->slug }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection