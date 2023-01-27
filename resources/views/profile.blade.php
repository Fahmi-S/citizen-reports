@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>halaman profile</h1>
    <div class="mt-5">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
@endsection