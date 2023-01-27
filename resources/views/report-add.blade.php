@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<section class="container">
    <div class="row content d-flex justify-content-center align-items-center">
        <div class="col-md-7">
            @if (session('status'))
                <div class="alert alert-success text-center">  
                    {{ session('message') }}
                </div>            
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box shadow bg-white p-4">
                <h3 class="mb-4 text-center fs-1">Report</h3>
                <form action="" method="POST" class="mb-3">
                    @csrf
                    <div class="mb-3 form-floating">
                        <textarea class="form-control py-5 rounded-0" id="floatingInput" rows="6" name="isi_laporan"></textarea>
                        <label for="floatingInput">Silahkan Jelaskan Apa Yang Akan Anda Laporkan</label>
                    </div>

                    <div class="mb-3">
                        <label for="floatingInput">Foto</label>
                        <input class="form-control rounded-0 mt-2" type="file" id="floatingInput" name="foto">
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-dark btn-lg border-0 rounded-0">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function myFunction() {
        var x = document.getElementById("floatingPassword");
        if(x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

@endsection