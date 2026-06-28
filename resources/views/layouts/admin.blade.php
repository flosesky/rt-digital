<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RT Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

.topbar{

    background:white;

    padding:15px 25px;

    border-radius:0;

}

.topbar h5{

    font-weight:700;

}

.topbar small{

    color:#6c757d;

}

body{

    background:#f4f6f9;

}

.sidebar{

    background:linear-gradient(180deg,#198754,#146c43);

    min-height:100vh;

}

.sidebar h4{

    font-weight:bold;

}

.sidebar hr{

    opacity:.4;

    margin:25px 0;

}

.sidebar .rounded-circle{

    box-shadow:0 6px 15px rgba(0,0,0,.15);

}

.sidebar .nav-link{

    color:#fff;

    display:flex;

    align-items:center;

    gap:12px;

    padding:14px 16px;

    margin-bottom:10px;

    border-radius:14px;

    transition:all .25s ease;

}

.sidebar .nav-link i{

    width:22px;

    text-align:center;

    font-size:18px;

}

.sidebar .nav-link:hover{

    background:rgba(255,255,255,.15);

    color:#fff;

}

.sidebar .nav-link.active{

    background:#fff;

    color:#198754 !important;

    font-weight:600;

    box-shadow:0 6px 16px rgba(0,0,0,.15);

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

    border-radius:14px;

}

</style>

</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="row">
        <button
    class="btn btn-success d-lg-none m-3"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#sidebarMenu">

    <i class="bi bi-list"></i>

    Menu

</button>

        <!-- Sidebar -->

       <div
    class="offcanvas-lg offcanvas-start sidebar text-white p-0 col-lg-2"
    tabindex="-1"
    id="sidebarMenu">

    <div class="offcanvas-header d-lg-none">

    <h5 class="offcanvas-title text-white">

        RT Digital

    </h5>

    <button
        type="button"
        class="btn-close btn-close-white"
        data-bs-dismiss="offcanvas">
    </button>

</div>

<div class="offcanvas-body p-0">

    <div class="p-3">

                <h4 class="text-center mt-3">

    <i class="bi bi-buildings-fill"></i>

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

        Administrator

    </div>

</div>

<hr class="text-white opacity-50">

<ul class="nav flex-column">

                    <li class="nav-item mb-2">

                       <a
    href="{{ route('admin.dashboard') }}"
    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-white' }}">

                            <i class="bi bi-speedometer2"></i>

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a
    href="{{ route('warga.index') }}"
    class="nav-link {{ request()->routeIs('warga.*') ? 'active' : 'text-white' }}">

                            <i class="bi bi-people-fill"></i>

                            Data Warga

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a
    href="{{ route('iuran.index') }}"
    class="nav-link {{ request()->routeIs('iuran.*') ? 'active' : 'text-white' }}">

                            <i class="bi bi-wallet2"></i>

                            Data Iuran

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                       <a
    href="{{ route('pembayaran.index') }}"
    class="nav-link {{ request()->routeIs('pembayaran.*') ? 'active' : 'text-white' }}">

                            <i class="bi bi-cash-stack"></i>

                            Pembayaran

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                       <a
    href="{{ route('pengumuman.index') }}"
    class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : 'text-white' }}">
    <i class="bi bi-megaphone-fill"></i>
    Pengumuman
</a>

                    </li>

                    <li class="nav-item mb-2">

                        <a
    href="{{ route('laporan.index') }}"
    class="nav-link {{ request()->routeIs('laporan.*') ? 'active' : 'text-white' }}">

    <i class="bi bi-file-earmark-pdf-fill"></i>

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

</div> {{-- p-3 --}}

</div> {{-- offcanvas-body --}}

</div> {{-- sidebar --}}

        <!-- Content -->

        <div class="col-lg-10 col-md-9 content-area">

            <nav class="navbar topbar shadow-sm px-4 py-3">

    <div>

        <h5 class="mb-0 fw-bold">

            👋 Selamat Datang,

            Admin RT

        </h5>

        <small class="text-muted">

            {{ now()->translatedFormat('l, d F Y') }}

        </small>

    </div>

    <div class="d-flex align-items-center">

        <div class="text-end me-3">

            <strong>

                {{ Auth::user()->name }}

            </strong>

            <br>

            <small class="text-muted">

                {{ Auth::user()->username }}

            </small>

        </div>

        <div
            class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center"
            style="width:45px;height:45px;">

            <i class="bi bi-person-fill"></i>

        </div>

    </div>

</nav>

            <div class="p-4">

                @yield('content')

                <footer class="text-center mt-5 py-3 text-muted">

    <hr>

    <small>

        © {{ date('Y') }} RT Digital

        | Developed by Aris Setiawan

    </small>

</footer>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>