<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RT Digital - Warga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        .topbar{
            background:white;
            padding:15px 25px;
        }

        .topbar h5{
            font-weight:700;
        }

        .sidebar{
            background:linear-gradient(180deg,#198754,#146c43);
            min-height:100vh;
        }

        .sidebar .nav-link{
            color:white;
            border-radius:10px;
            padding:12px;
            transition:.3s;
        }

        .sidebar .nav-link:hover{
            background:rgba(255,255,255,.18);
            transform:translateX(6px);
        }

        .sidebar .nav-link.active{
            background:white;
            color:#198754 !important;
            font-weight:bold;
        }

        .content-area{
            background:#f4f6f9;
            min-height:100vh;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .btn{
            border-radius:10px;
        }

    </style>

</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->

       <div class="col-lg-2 col-md-3 sidebar text-white p-0">

    <div class="p-3">

        <h4 class="text-center mt-3">

    <i class="bi bi-house-heart-fill"></i>

    <br>

    RT DIGITAL

</h4>

<div class="text-center my-4">

    <div
        class="rounded-circle bg-white text-success d-flex justify-content-center align-items-center mx-auto"
        style="width:70px;height:70px;font-size:32px;">

        <i class="bi bi-person-fill"></i>

    </div>

    <h6 class="mt-3 mb-1 text-white">

        {{ Auth::user()->name }}

    </h6>

    <div class="text-white-50 small">

        {{ Auth::user()->username }}

    </div>

    <div class="text-white-50 small">

        Warga

    </div>

</div>

<hr class="text-white opacity-50">

                <ul class="nav flex-column">

                    <li class="nav-item mb-2">

                       <a
    href="{{ route('warga.dashboard') }}"
    class="nav-link {{ request()->routeIs('warga.dashboard') ? 'active' : 'text-white' }}">

                            <i class="bi bi-house-door-fill"></i>

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                       <a
    href="{{ route('warga.qris') }}"
    class="nav-link {{ request()->routeIs('warga.qris') ? 'active' : 'text-white' }}">
    <i class="bi bi-qr-code-scan"></i>
    Bayar Iuran (QRIS)
</a>

                    </li>

                    <li class="nav-item mb-2">

                        <a
    href="{{ route('warga.riwayat') }}"
    class="nav-link {{ request()->routeIs('warga.riwayat') ? 'active' : 'text-white' }}">

    <i class="bi bi-clock-history"></i>

    Riwayat Pembayaran
</a>

                    </li>

                    <li class="nav-item mb-2">

                            <a
    href="{{ route('warga.pengumuman') }}"
    class="nav-link {{ request()->routeIs('warga.pengumuman') ? 'active' : 'text-white' }}">

    <i class="bi bi-megaphone-fill"></i>

    Pengumuman

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
                </div> {{-- p-3 --}}

        </div>

        <!-- Content -->

       <div class="col-lg-10 col-md-9 content-area">

            <nav class="navbar topbar shadow-sm px-4 py-3">

    <div>

        <h5 class="mb-0 fw-bold">

            👋 Selamat Datang,

            {{ Auth::user()->name }}

        </h5>

        <small class="text-muted">

            {{ now()->translatedFormat('l, d F Y') }}

        </small>

    </div>

    <div class="text-end">

        <strong>

            {{ Auth::user()->username }}

        </strong>

        <br>

        <small class="text-muted">

            Warga

        </small>

    </div>

</nav>

            <div class="p-4">
<hr>

                @yield('content')
                <footer class="text-center mt-5 py-3 text-muted">

    <hr>

    <small>

        © {{ date('Y') }} RT Digital

    </small>

</footer>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>