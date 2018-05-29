<!DOCTYPE html>
<html>
	
	<head>
		<title>@yield('judul')</title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <link href="{{ asset('freelancer/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	    <!-- Custom fonts for this template -->
	    <link href="{{ asset('freelancer/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	    <!-- Plugin CSS -->
	    <link href="{{ asset('freelancer/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

	    <!-- Custom styles for this template -->
	    <link href="{{ asset('freelancer/css/freelancer.min.css') }}" rel="stylesheet">

	    <!-- Scripts -->
	    <script src="{{ asset('freelancer/js/app.js') }}" defer></script>

	    @yield('morris_chart_css')

	</head>

	<body id="page-top">

		@include('include.header')

		@yield('content')

		@include('include.footer')

		<div class="copyright py-4 text-center text-white">
	      <div class="container">
	        <small>Copyright &copy; Freelancer</small>
	      </div>
	    </div>

	    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
	    <div class="scroll-to-top d-lg-none position-fixed ">
	      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
	        <i class="fa fa-chevron-up"></i>
	      </a>
	    </div>

	    <script src="{{ asset('freelancer/vendor/jquery/jquery.min.js') }}"></script>
	    <script src="{{ asset('freelancer/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	    <!-- Plugin JavaScript -->
	    <script src="{{ asset('freelancer/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	    <script src="{{ asset('freelancer/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	    <!-- Contact Form JavaScript -->
	    <script src="{{ asset('freelancer/js/jqBootstrapValidation.js') }}"></script>
	    <script src="{{ asset('freelancer/js/contact_me.js') }}"></script>

	    <!-- Custom scripts for this template -->
	    <script src="{{ asset('freelancer/js/freelancer.min.js') }}"></script>

	    @yield('morris_chart_js')

	</body>

</html>