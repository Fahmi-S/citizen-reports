@extends('layouts.mainlayout')

@section('title', 'Report Process List')

@section('content')

<h3 class="text-center">Report Process List</h3>

    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-3">
        <a href="/report-process-pdf" target="_blank" class="btn btn-primary">Print PDF</a>
    </div>

    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal / Jam</th>
                    <th scope="col">Tanggapan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration + $report->firstItem()-1}}</th>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->masyarakat->nama }}</td>
                        <td>{{ $item->tanggapan->created_at }}</td>
                        <td>{{ $item->tanggapan->tanggapan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/report-finished-detail/{{$item->id}}" class="btn btn-success">More</a>
                            <a href="/report-delete/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="me-3">   
            {{$report->withQueryString()->links()}}
        </div>
    </div>
@endsection