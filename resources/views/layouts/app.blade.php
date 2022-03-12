<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Page title -->
    <title>
        Shopping Cart
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Header -->
    @empty($activeMenu) @php $activeMenu = null @endphp @endempty
    @include('layouts.header', ['activeMenu' => $activeMenu])
    <!-- Page content -->
    @yield('content')
    <!-- Footer -->
    <footer>
        {{-- @include('layouts.footer') --}}
    </footer>
    {{-- JS scripts --}}
    <script src="{{ asset('js/libs/bootstrap.bundle.min.js') }}"></script>
    @stack('js')
</body>

</html>
