@extends('layouts.mainlayout')

@section('title', 'Report List')

@section('content')

<h3 class="text-center">Report List</h3>

    @if (Auth::guard('admin')->user()->level == 'admin')
        <div class="my-3">
            <a href="/report-pdf" target="_blank" class="btn btn-primary">Print PDF</a>
        </div>
    @else

    @endif

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
                    <th>NIK</th>
                    <th >Nama</th>
                    <th>Tanggal & Jam</th>
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
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if ($item->status == '')
                                <p class="badge text-bg-info">Belum Diverval</p>
                            @elseif($item->status == '0')
                                <p class="badge text-bg-danger">Ditolak</p>
                            @elseif($item->status == 'proses')
                                <p class="badge text-bg-warning">Sedang Di Proses</p>
                            @elseif($item->status == 'selesai')
                                <p class="badge text-bg-success">Selesai</p>
                            @endif
                            
                        </td>
                        <td>
                            <form action="/report-process/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
                                <button type="submit" name="action" value="proses" class="btn btn-warning">Proses</button>
                                <button type="submit" name="action" value="selesai" class="btn btn-success">Selesai</button>
                            </form>
                        </td>
                        <td>
                            {{-- <a href="/report-recent-detail/{{ $item->id }}" class="btn btn-info">Detail</a> --}}
                            <a href="/report-detail/{{ $item->id }}" class="btn btn-info">Detail</a>
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