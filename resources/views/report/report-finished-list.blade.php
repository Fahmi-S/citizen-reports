@extends('layouts.mainlayout')

@section('title', 'Report Finished List')

@section('content')

<h3 class="text-center">Report Finished List</h3>

    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    @if (Auth::guard('admin')->user()->level == 'admin')
        <div class="my-3">
            <a href="/report-finished-pdf" target="_blank" class="btn btn-primary">Print PDF</a>
        </div>
    @else
    
    @endif

    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Tanggal Terakhir Ditanggapi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $report->firstItem()-1}}</th>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->masyarakat->nama }}</td>
                        <td>{{ $item->created_at->format('l, d F Y - H:i:s') }}</td>
                        <td>{{ $tanggapan->created_at->format('l, d F Y - H:i:s') }}</td>
                        <td><p class="badge text-bg-success">{{ $item->status = 'Selesai'}}</p></td>
                        <td>
                            <a href="/report-details/{{$item->id}}" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-3">   
            {{$report->withQueryString()->links()}}
        </div>
    </div>
@endsection