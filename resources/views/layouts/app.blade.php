<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Senpal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('js/jquery.countTo.js')}}"></script>

	<!-- Stellar Parallax -->
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>

	<!-- Magnific Popup -->
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup-options.js')}}"></script>

	<!-- Datepicker -->
	<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>


	<!-- Main -->
	<script src="{{asset('js/main.js')}}"></script>

	<script src=“https://js.pusher.com/3.2/pusher.min.js“></script>
	<script src=“https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js”></script>

</head>

<body>

	<div id="page">
		<!-- <div class="page-inner"> -->

		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">

				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="{{ url('/')}}">Senpal</a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							@guest
							@if (Route::has('login'))
							<li>
								<a href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@endif

							@if (Route::has('register'))
							<li>
								<a href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
							@else

							<li>
								<a href="{{ url('mypage/') }}" >
									{{ Auth::user()->name }}
								</a>
							</li>

							<li>
								<a href="{{ url('makegroup') }}">
									Create Group
								</a>
							</li>

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
							</li>

							<form id="logout-form" action="{{ route('logout') }}" method="POST">
								@csrf
							</form>
						</ul>

						</li>
						@endguest
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner">
			<div class="overlay"></div>
		</header>

		<main class="py-4">
			@yield('content')
		</main>

		<footer id="gtco-footer" role="contentinfo">
			<div class="gtco-container">
				<div class="row row-p	b-md">

					<div class="col-md-4">
						<div class="gtco-widget">
							<h3>About Us</h3>
							<p>This is a web-site connecting those who want to work in Japan with non-Japanese workers in Japan</p>
						</div>
					</div>

					<div class="col-md-3 col-md-push-1">
						<div class="gtco-widget">
							<h3>Get In Touch</h3>
							<ul class="gtco-quick-contact">
								<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
								<li><a href="#"><i class="icon-mail2"></i> info@gmail.com</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="row copyright">
					<div class="col-md-12">
						<p class="pull-left">
							<small class="block">&copy; 2022 Kazuki Yamamoto. All Rights Reserved.</small>
						</p>
						<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
						</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>


	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('js/jquery.countTo.js')}}"></script>

	<!-- Stellar Parallax -->
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>

	<!-- Magnific Popup -->
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup-options.js')}}"></script>

	<!-- Datepicker -->
	<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>


	<!-- Main -->
	<!-- <script src="{{asset('js/main.js')}}"></script> -->

</body>

</html>