@extends('layouts.mainlayout')

@section('title', 'Report List')

@section('content')

<h3 class="text-center">Report Incoming List</h3>

    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-3">
        <a href="/report-decline-pdf" target="_blank" class="btn btn-primary">Print PDF</a>
    </div>

    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal / Jam</th>
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
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/report-process/{{ $item->id }}" class="btn btn-warning">More</a>
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