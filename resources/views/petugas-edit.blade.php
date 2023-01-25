@extends('layouts.mainlayout')

@section('title', 'Petugas Edit')

@section('content')

<h3 class=>Edit Petugas</h3>
<div class="d-flex justify-content-end">
    <a href="/petugas-list" class="btn btn-primary">Kembali</a>
</div>
    <div class="row g-3 my-2 w-50 ">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <form action="/petugas-edit/{{ $petugas->slug }}" method="post">
                @csrf
                @method('PUT')
                <div class>
                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" value="{{ $petugas->nama_petugas }}" placeholder="Nama Petugas...">
                </div>

                <div class="mt-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ $petugas->username }}" placeholder="Username...">
                </div>

                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
                </div>

                <div class="mt-3">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" name="telp" id="telp" value="{{ $petugas->telp }}" placeholder="Telephone...">
                </div>

                <div class="mt-3 w-50">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                    <h6>Current Level : {{ $petugas->level }}</h6>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection