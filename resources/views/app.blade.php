<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    @include('_ui.html.head')
</head>
<body class="h-100 d-flex flex-column">

    <header>
        @include('_ui.html.navbar-top')
        @include('_ui.html.navbar-second')
    </header>

    <main class="container">
        @yield('content')
        @include('_ui.html.footer')
    </main>

    @include('_ui.html.scripts')

</body>
</html>
