@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3 my-2">
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">720</h3>
                <p class="fs-5">User</p>
            </div>
            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">4920</h3>
                <p class="fs-5">Processing Reports</p>
            </div>
            <i class="fa-sharp fa-solid fa-circle-pause fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">3899</h3>
                <p class="fs-5">Completed Reports</p>
            </div>
            <i class="fas fa-solid fa-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2">5000</h3>
                <p class="fs-5">All Reports</p>
            </div>
            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>
<div class="row my-5">
    <h3 class="fs-4 mb-3">Logs</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Incoming Report</th>
                    <th>Processing Report</th>
                    <th>Decline Report</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>5</td>
                    <td>8</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection