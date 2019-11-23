<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title')</title>

	<!-- Google font -->
	<link href="{{ asset('css/font.css') }}" rel="stylesheet" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>

<body>
	<!-- top Header -->
	<div id="top-header">
		<div class="container">
			<div class="pull-left">
				<span>Selamat datang admin SewaKuy!</span>
			</div>
			<div class="pull-right">
				<ul class="header-top-links">
					<i class="fa fa-user-circle-o"></i>
					<li class="dropdown default-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							{{ Auth::user()->name }} (Administrator)
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /top Header -->
	<!-- HEADER -->
	<header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo">
							<img src="{{ asset('img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Pencarian...">

							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown text-center">
							<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<span class="tooltipp">Pemberitahuan</span>
								<div class="header-btns-icon">
									<i class="fa fa-bell"></i>
									<span class="qty">4</span>
								</div>
							</div>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										@for ($k = 1; $k <= 4; $k++) <div class="product product-widget" style="width: 240px;">
											<div class="product-thumb">
												<img src="{{ asset("img/thumb-product0$k.jpg") }}" alt="">
											</div>
											<div class="product-body">
												<h2 class="product-name font-weak"><a href="#">
														<p style="text-align: justify; font-size: 12px;">
															Mr. X melaporkan Mr. Y karena iklan yang dibuat Mr. Y adalah penipuan.
														</p>
													</a></h2>
											</div>
									</div>
									@endfor
								</div>
								<div class="shopping-cart-btns">
									<button class="primary-btn" style="font-size: 11px; width: 200px;"><i class="fa fa-trash"></i> Bersihkan</button>
								</div>
							</div>
				</div>
				</li>
				<!-- /Cart -->

				<!-- Account -->
				<li class="header-account dropdown default-dropdown text-center">
					<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
						<span class="tooltipp">Menu</span>
						<div class="header-btns-icon">
							<i class="fa fa-bars"></i><br>
						</div>
					</div>
					<ul class="custom-menu" style="text-align:left;">
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
								<i class="fa fa-sign-out"></i> Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
				<!-- /Account -->

				<!-- Mobile nav toggle-->
				<li class="nav-toggle">
					<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
				</li>
				<!-- / Mobile nav toggle -->
				</ul>
			</div>
		</div>
		<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<div class="category-nav show-on-click">
					<span class="category-header"><a href="/" style="color:white">Beranda</a></span>
				</div>
				<!-- /category nav -->
				<!-- menu nav -->
				<div class="menu-nav">
					<ul class="menu-list">
						<li><a href="/daftar/user">Daftar User</a></li>
						<li><a href="/daftar/iklan">Daftar Iklan</a></li>
						<li><a href="/daftar/transaksi">Daftar Transaksi</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Daftar Pelaporan <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="/daftar/pelaporan/user">Pelaporan User</a></li>
								<li><a href="/daftar/pelaporan/iklan">Pelaporan Iklan</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
	@yield('content')
	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
	<!-- jQuery Plugins -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>