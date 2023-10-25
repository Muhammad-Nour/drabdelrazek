<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('site.layouts.head')

    @yield('css')

</head>
<body>

@include('site.layouts.nav')

@yield('content')

@include('site.layouts.footer')


@include('site.layouts.sidebar')


@include('site.layouts.script')

@yield('js')

</body>
</html>
