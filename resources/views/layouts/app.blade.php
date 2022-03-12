<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tytuł strony -->
    <title>
        Shopping Cart
    </title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Nagłówek -->
    @empty($aktywneMenu) @php $aktywneMenu = null @endphp @endempty
    @include('layouts.header', ['aktywneMenu' => $aktywneMenu])
    <!-- Zawartość strony -->
    @yield('content')
    <!-- Stopka -->
    <footer>
        {{-- @include('layouts.footer') --}}
    </footer>
    {{-- Skrypty JS --}}
    <script src="{{ asset('js/libs/bootstrap.bundle.min.js') }}"></script>
    @stack('js')
</body>

</html>
