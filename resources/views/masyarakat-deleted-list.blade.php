@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h3 class="text-center">Masyarakat Deleted List</h3>
    <div class="d-flex justify-content-center">
        <a href="/masyarakat-list" class="btn btn-primary">- Kembali</a>
    </div>
    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    
    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedMasyarakat as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nik}}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>
                            <a href="masyarakat-restore/{{ $item->slug }}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection