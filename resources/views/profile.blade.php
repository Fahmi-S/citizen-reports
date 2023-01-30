@extends('layouts.mainlayout')

@section('title', 'Profile Detail')

@section('content')
<style>
    .form-label{
        font-size: 13px;
    }
</style>
<h3 class="mb-4 text-center fs-1">Profile</h3>
<div class="mt-5">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>
@if (Auth::guard('masyarakat')->user())
    @foreach ($masyarakat as $item)
        <div class="container rounded bg-white mb-5 mt-5">
            <div class="row">
                <div class="col-md-3 bg-info border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if ($item->foto != '')
                            <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/profile/masyarakat/'.$item->foto) }}">
                        @else
                            <img class="rounded-circle mt-5" src="{{ asset('images/user.png') }}" width="150px">
                        @endif
                        
                        <span class="font-weight-bold">
                            {{$item->nama}}
                        </span>
                        <span class="text-black-50">
                            Role : Masyarakat
                        </span>
                        <span> </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Detail</h4>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control rounded-0" placeholder="NIK" name="nik" value="{{ $item->nik }}" disabled>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control rounded-0" placeholder="Nama Masyarakat" name="nama" value="{{ $item->nama }}" disabled>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control rounded-0" placeholder="username" name="username" value="{{ $item->username }}" disabled>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control rounded-0" name="telp" placeholder="Phone" value="{{ $item->telp }}" disabled>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="/profile-edit" class="btn btn-primary me-3">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    @endforeach
@elseif(Auth::guard('admin')->user())
    @foreach ($petugas as $item)
            <div class="container rounded bg-white mb-5 mt-5">
                <div class="row">
                    <div class="col-md-3 bg-info border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            @if ($item->foto != '')
                                <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/profile/petugas/'.$item->foto) }}">
                            @else
                                <img class="rounded-circle mt-5" src="{{ asset('images/user.png') }}" width="150px">
                            @endif
                            
                            <span class="font-weight-bold">
                                {{$item->nama_petugas}}
                            </span>
                            <span class="text-black-50">
                                Role : {{$item->level}}
                            </span>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Detail</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control rounded-0" placeholder="Nama Petugas" name="nama_petugas" value="{{ $item->nama_petugas }}" disabled>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control rounded-0" placeholder="username" name="nama_petugas" value="{{ $item->username }}" disabled>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control rounded-0" name="telp" placeholder="Phone" value="{{ $item->telp }}" disabled>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/profile-edit" class="btn btn-primary me-3">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endforeach
@endif
@endsection