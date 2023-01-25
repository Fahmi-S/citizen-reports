<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboardstyle.css') }}">
    <title>Pengaduan Masyarakat | @yield('title')</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        {{-- Sidebar Dimulai dari sini --}}

        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                Citizen Reports</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard" class="list-group-item list-group-item-action bg-transparent second-text fs-4 text-center active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <hr>
                {{-- USER SIDEBAR --}}
                <h5 class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-start active">
                    <i class="fa-solid fa-user"> USER</i>
                </h5>
                <a href="profile" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Profile</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Change Password</li></h6>
                </a>
                {{-- garis --}}
                <hr>
                {{-- garis --}}
                {{-- DATA MANAGING --}}
                <h5 class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-start active">
                    <i class="fa-solid fa-user-shield"> Report</i>
                </h5>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Incoming Report</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Processing Report</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Declined Report</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Finished Report</li></h6>
                </a>
                
                <hr>
                
                <h5 class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-start active">
                    <i class="fa-solid fa-users"> Account</i>
                </h5>
                <a href="petugas-list" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Petugas</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Masyarakat</li></h6>
                </a>
                

                {{-- garis --}}
                <hr>
                {{-- garis --}}
                <h6 class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7 active">
                    <i class="fa-solid fa-file-pdf"> Generate Report</i>
                </h6>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>PDF</li></h6>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-7">
                    <h6><li>Excel</li></h6>
                </a>
                {{-- garis --}}
                <hr>
                {{-- garis --}}
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout
                </a>
            </div>
        </div>
        {{-- Sidebar berhenti disini--}}
        
        {{-- Page Content --}}
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">
                        @if (request()->route()->uri == 'profile')Profile
                        @elseif (request()->route()->uri == 'dashboard')Dashboard
                        @elseif (request()->route()->uri == 'account-manage' || request()->route()->uri == 'account-add')Account Manage
                        @endif
                    </h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle primary-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                @yield('content')
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>