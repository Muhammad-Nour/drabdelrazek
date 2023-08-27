<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.head')

    @yield('css')

</head>
<body  class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('layouts.nav')

        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-image: url('{{asset('design/images/lockscreen.png')}}');">

             <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                    <h1>@yield('title-page', '')</h1>
                    </div>

                </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                @yield('content')

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

          @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.script')

    @yield('js')

</body>
</html>