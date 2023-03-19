@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3 my-2">
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">{{$total_user}}</h3>
                <p class="fs-5">User</p>
            </div>
            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">{{$processreport_count}}</h3>
                <p class="fs-5">Processing Reports</p>
            </div>
            <i class="fa-sharp fa-solid fa-circle-pause fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">{{$finishedreport_count}}</h3>
                <p class="fs-5">Completed Reports</p>
            </div>
            <i class="fas fa-solid fa-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">{{$allreport_count}}</h3>
                <p class="fs-5">All Reports</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>
@endsection