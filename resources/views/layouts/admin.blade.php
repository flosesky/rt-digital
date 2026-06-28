<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RT Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->

        <div class="col-md-2 bg-dark text-white min-vh-100 p-0">

            <div class="p-3">

                <h4 class="text-center">

                    RT Digital

                </h4>

                <hr>

                <ul class="nav flex-column">

                    <li class="nav-item mb-2">

                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">

                            <i class="bi bi-speedometer2"></i>

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="{{ route('warga.index') }}" class="nav-link text-white">

                            <i class="bi bi-people-fill"></i>

                            Data Warga

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="{{ route('iuran.index') }}" class="nav-link text-white">

                            <i class="bi bi-wallet2"></i>

                            Data Iuran

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="{{ route('pembayaran.index') }}" class="nav-link text-white">

                            <i class="bi bi-cash-stack"></i>

                            Pembayaran

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="{{ route('pengumuman.index') }}" class="nav-link text-white">
    <i class="bi bi-megaphone-fill"></i>
    Pengumuman
</a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#" class="nav-link text-white">

                            <i class="bi bi-file-earmark-pdf"></i>

                            Laporan

                        </a>

                    </li>

                    <li class="nav-item mt-4">

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button class="btn btn-danger w-100">

                                <i class="bi bi-box-arrow-right"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

        <!-- Content -->

        <div class="col-md-10">

            <nav class="navbar navbar-light bg-white shadow-sm px-4">

                <span class="navbar-brand mb-0 h5">

                    Sistem Informasi RT Digital

                </span>

            </nav>

            <div class="p-4">

                @yield('content')

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>