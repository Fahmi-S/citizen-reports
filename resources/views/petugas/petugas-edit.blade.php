@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h3 class=>Edit Masyarakat</h3>
<div class="d-flex justify-content-start">
    <a href="petugas-list" class="btn btn-primary">- Kembali</a>
</div>
    <div class="row g-3 my-2 w-50">
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
            <form action="/petugas-edit/{{ $petugas->slug }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="nama_petugas" class="form-control rounded-0" value="{{ $petugas->nama_petugas }}" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nama Petugas</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control rounded-0" value="{{ $petugas->username }}" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password...">
                    <label for="floatingPassword">New Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="telp" class="form-control rounded-0" value="{{ $petugas->telp }}" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Telephone</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="autoSizingCheck2">
                    <label class="form-check-label">Show Password</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="level" id="floatingSelect" class="form-select">
                        <option selected hidden>{{ $petugas->level }}</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                    </select>
                    <label for="floatingSelect">Level</label>
                    <h6>Current Level: {{ $petugas->level }}</h6>
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("floatingPassword");
            if(x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection