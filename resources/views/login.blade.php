<!doctype html>
<html lang="en">
  <head>
  	<title>المبدأ للديكور - تسجيل دخول</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('design/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('design/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('design/admin/dist/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('design/admin/dist/css/add-style.css') }}">

  <link rel="stylesheet" href="{{ asset('design/admin/dist/css/bootstrap.min.css') }}">

	</head>
	<body>

	<section class="ftco-section img js-fullheight" style="background-image: url('{{asset('design/images/lockscreen.png')}}'); padding-top: 50px;">
		<div class="container">
			<div style="margin-bottom: 50px;">
      		<center><img src="{{ asset('design/images/newlogo.jpg') }}" alt="" style="opacity:0.75 ;height: 180px;"></center>
    	</div>
			<div class="row justify-content-center">

				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="{{ route('login') }}" class="signin-form" method="post">
		        @csrf
		      		<div class="form-group">
		      			<input type="email" name="email" class="form-control" placeholder="Email"
		      			style="background-color:unset;border: 2px solid;" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password"
	              style="background-color:unset;border: 2px solid;" required name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-info submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	@include('partial.alerts')
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

<!-- jQuery -->
<script src="{{ asset('design/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('design/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('design/admin/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('design/admin/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('design/admin/dist/js/jquery.min.js') }}"></script>

<script src="{{ asset('design/admin/dist/js/main.js') }}"></script>

<script src="{{ asset('design/admin/dist/js/popper.js') }}"></script>
</body>
</html>

