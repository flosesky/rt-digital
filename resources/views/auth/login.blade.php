<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - RT Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body{

            background:linear-gradient(135deg,#198754,#20c997);

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

        }

        .login-card{

            width:420px;

            border:none;

            border-radius:20px;

            overflow:hidden;

            box-shadow:0 20px 50px rgba(0,0,0,.25);

        }

        .login-header{

            background:#198754;

            color:white;

            padding:35px;

            text-align:center;

        }

        .login-header i{

            font-size:60px;

        }

        .btn-login{

            background:#198754;

            color:white;

            border-radius:10px;

        }

        .btn-login:hover{

            background:#146c43;

            color:white;

        }

    </style>

</head>

<body>

<div class="card login-card">

    <div class="login-header">

        <i class="bi bi-buildings-fill"></i>

        <h2 class="mt-3 mb-1">

            RT DIGITAL

        </h2>

        <small>

            Sistem Informasi Pelayanan Warga

        </small>

    </div>

    <div class="card-body p-4">

        @if(session('status'))

            <div class="alert alert-success">

                {{ session('status') }}

            </div>

        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Username

                </label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    value="{{ old('username') }}"
                    required
                    autofocus>

                @error('username')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>

                @error('password')

                    <small class="text-danger">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            <div class="form-check mb-3">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember">

                <label
                    class="form-check-label"
                    for="remember">

                    Ingat Saya

                </label>

            </div>

            <button
                type="submit"
                class="btn btn-login w-100">

                <i class="bi bi-box-arrow-in-right"></i>

                Login

            </button>

        </form>

    </div>

    <div class="card-footer text-center text-muted">

        © {{ date('Y') }} RT Digital

    </div>

</div>

</body>

</html>