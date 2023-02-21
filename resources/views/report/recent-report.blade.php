@extends('layouts.mainlayout')

@section('title', 'Report List')

@section('content')


<h3 class="text-center">Report Recent List</h3>
    

    <div class="my-4 bg-white rounded shadow-sm table-hover table-responsive text-center">
        <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="50">No.</th>
                    <th>Nik</th>
                    <th >Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Tanggapan</th>
                    <th>Tanggal Ditanggapi</th>
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
                            <td>{{ $item->tanggapan->tanggapan ?? ''}}</td>
                            <td>{{ $item->tanggapan->created_at ?? ''}}</td>
                            <td>{{ $item->status }}</td>
                            <td>
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
    </div>
@endsection