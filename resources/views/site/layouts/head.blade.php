<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    @yield('title', config('app.name', 'Drabdelrazek'))
</title>

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="author" content="Vecuro">
<meta name="description">
<meta name="keywords">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

<script src="{{ asset('design/js/jquery-3.7.1.min.js') }}"></script>

<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&amp;family=Quicksand:wght@400;700&amp;family=Roboto:wght@400;500;700&amp;display=swap"
    rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('images/logo.png')}}" type="image/x-icon">
<link rel="icon"       href="{{ asset('images/logo.png')}}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('design-site/css/app.min.css')}}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

<link rel="stylesheet" href="{{ asset('design-site/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('design-site/css/animate.min.css')}}">

<link rel="stylesheet" href="{{ asset('design-site/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('design-site/css/add-style.css') }}">

<link rel="stylesheet" href="{{ asset('design-site/css/style-rtl.css') }}">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PH89B75W');</script>
<!-- End Google Tag Manager -->