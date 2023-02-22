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

    @if (Auth::guard('admin')->user()->level == 'admin')
        <div class="my-3">
            <a href="/report-process-pdf" target="_blank" class="btn btn-primary">Print PDF</a>
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
                    <th>Status</th>
                    <th>Verval Status</th>
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
                        <td><p class="badge text-bg-warning">{{ $item->status = 'Sedang Di Proses'}}</p> </td>
                        <td>
                            <form action="/report-process/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
                                <button type="submit" name="action" value="selesai" class="btn btn-success">Selesai</button>
                            </form>
                        </td>
                        <td>
                            <a href="/report-finished-detail/{{$item->id}}" class="btn btn-info">Berikan Tanggapan</a>
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