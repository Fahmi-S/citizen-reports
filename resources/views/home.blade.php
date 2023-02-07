@extends('layouts.mainlayout')

@section('title', 'Profile Detail')

@section('content')

<h2>Selamat Datang, 
    @if (Auth::guard('masyarakat')->user())
        {{ Auth::guard('masyarakat')->user()->nama }}
    @elseif(Auth::guard('admin')->user())
        {{ Auth::guard('admin')->user()->nama_petugas }}
    @endif
</h2>

<div class="row my-5">
    <h3 class="fs-4 mb-3">Call Center</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Bantuan</th>
                    <th>Instansi/Unit</th>
                    <th>Nomor Telephone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Perusahaan Listrik Negara</td>
                    <td>Call Center PLN Medan</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Perusahaan Listrik Negara</td>
                    <td>PT. PLN Persero Pembangkitan Sumatera Bagian Utara</td>
                    <td>(061) 7869025</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Perusahaan Listrik Negara</td>
                    <td>PLN UPB wilayah Sumut</td>
                    <td>(061) 6615125</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



@endsection