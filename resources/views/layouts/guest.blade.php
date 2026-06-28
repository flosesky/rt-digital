<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RT Digital</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    class="font-sans antialiased bg-gradient-to-br from-green-700 via-green-600 to-emerald-500">

    <div
        class="min-h-screen flex items-center justify-center p-5">

        <div
            class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-md">

            <div
                class="bg-green-700 text-white text-center py-8">

                <div
                    class="text-6xl mb-3">

                    🏠

                </div>

                <h2
                    class="text-3xl font-bold">

                    RT DIGITAL

                </h2>

                <p
                    class="mt-2 text-green-100">

                    Sistem Informasi Pelayanan Warga

                </p>

            </div>

            <div
                class="p-8">

                {{ $slot }}

            </div>

            <div
                class="bg-gray-100 text-center py-3 text-sm text-gray-500">

                © {{ date('Y') }} RT Digital

            </div>

        </div>

    </div>

</body>

</html>