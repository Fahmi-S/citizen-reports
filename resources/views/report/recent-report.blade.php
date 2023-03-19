@extends('layouts.mainlayout')

@section('title', 'Report List')

@section('content')


<h3 class="text-center">Report Recent List</h3>
    
<div class="mt-5">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th>Nik</th>
                    <th >Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $item)
                        <tr>
                            <th>{{ $loop->iteration + $report->firstItem()-1}}</th>
                            <td>{{ $item->masyarakat->nik }}</td>
                            <td>{{ $item->isi_laporan }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status == '')
                                    <p class="badge text-bg-info">Belum Diverval</p>
                                @elseif($item->status == '0')
                                    <p class="badge text-bg-danger">Ditolak</p>
                                @elseif($item->status == 'proses')
                                    <p class="badge text-bg-warning">Sedang Diproses</p>
                                @elseif($item->status == 'selesai')
                                    <p class="badge text-bg-success">Selesai</p>
                                @endif
                            <td>
                                <a href="/report-recent-detail/{{ $item->id }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-3">
            {{$report->withQueryString()->links()}}
        </div>
        </div>
    </div>
@endsection