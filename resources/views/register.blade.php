<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register</title>
</head>
<body>
    <section class="container">
        <div class="row content d-flex justify-content-center align-items-center">
            <div class="col-md-5">
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
                    <h3 class="mb-4 text-center fs-1">Register</h3>
                    <form action="" method="POST" class="mb-3">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nik" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">NIK</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nama" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password...">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="telp" class="form-control rounded-0" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Telephone</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" onclick="myFunction()" id="autoSizingCheck2">
                            <label class="form-check-label">Show Password</label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-dark btn-lg border-0 rounded-0">Register</button>
                        </div>
                        <div class="sign-up-accounts">
                            <a href="/login" class="d-flex justify-content-center mb-3 text-decoration-none">Or Sign In</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>