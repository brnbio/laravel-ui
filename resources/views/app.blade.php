<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    @include('_layout.html.head')
</head>
<body class="h-100 d-flex flex-column">

    <header>
        @include('_layout.html.navbar-top')
        @include('_layout.html.navbar-second')
    </header>

    <main class="container">
        @yield('content')
        @include('_layout.html.footer')
    </main>

    @include('_layout.html.scripts')

</body>
</html>
