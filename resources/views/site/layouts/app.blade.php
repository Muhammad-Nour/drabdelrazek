<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('site.layouts.head')

    @yield('css')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11466161114"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-11466161114');
    </script>
    <!-- Event snippet for Page view (1) conversion page --> 
    <script> gtag('event', 'conversion', {'send_to': 'AW-11466161114/fZmvCMOttYYZENr3vtsq'}); </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-85KZFQ9JLR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-85KZFQ9JLR');
    </script>

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
