<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
    @yield('title', config('app.name', 'Almabda'))
</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('design/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('design/admin/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('design/admin/plugins/summernote/summernote-bs4.min.css') }}">

<!-- Bootstrap 4 RTL-->
<link rel="stylesheet" href="design/admin/dist/css/bootstrap-rtl.min.css">
<!-- Custom style for RTL -->
<link rel="stylesheet" href="{{ asset('design/admin/dist/css/custom.css') }}">

<link rel="stylesheet" href="{{ asset('design/css/sweetalert2.min.css') }}">

<link rel="stylesheet" href="{{ asset('design/css/layout-style.css') }}">

<link rel="stylesheet" href="{{ asset('design/css/add-style.css') }}">

<link rel="stylesheet" href="{{ asset('design/css/style.css') }}">

<link rel="stylesheet" href="{{ asset('design/css/print-area.css') }}">
