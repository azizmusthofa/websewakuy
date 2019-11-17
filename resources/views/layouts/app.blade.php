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
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />


</head>
@guest
<body>
	<!-- HEADER -->
	<header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="/beranda">
							<img src="{{ asset('img/logo.png') }}" alt="">
						</a>
					</div>
                    <!-- /Logo -->
                    <!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Sewa barang yuk...">
							<select class="input search-categories" style="width: 155px;">
								<option value="0">Semua Kategori</option>
								<option value="1">Kendaraan</option>
								<option value="2">Elektronik</option>
								<option value="3">Alat Pesta</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">

                        <!-- Login -->
						<li class="header-account dropdown default-dropdown">
							<a href="{{ route('login') }}">
								<strong class="text-uppercase">Login</strong>
							</a>	
						</li>
						<!-- /Login -->
                        @if (Route::has('register'))
						<!-- Register -->
						<li class="header-account dropdown default-dropdown">
							<a href="{{ route('register') }}">
								<strong class="text-uppercase">Daftar</strong>		
							</a>
						</li>
                        <!-- /Register -->
                        @endif

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
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
					<ul class="category-list">
					<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Kendaraan <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links" >
											<li><a href="#">Mobil</a></li>
											<li><a href="#">Sepeda Motor</a></li>
											<li><a href="#">Pick Up</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Elektronik <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links">
											<li><a href="#">Laptop</a></li>
											<li><a href="#">Kamera</a></li>
											<li><a href="#">Sound System</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Kebutuhan Pesta <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links">
											<li><a href="#">Alat Pesta</a></li>
											<li><a href="#">Gaun Pesta</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/beranda">Beranda</a></li>
						<li><a href="#">Kendaraan</a></li>
						<li><a href="#">Elektronik</a></li>
						<li><a href="#">Alat Pesta</a></li>
						<li><a href="#">Tentang Kami</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Lainnya <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="product-page.html">Kritik & Saran</a></li>
								<li><a href="product-page.html">Kebijakan & Privasi</a></li>
								<li><a href="products.html">Bantuan</a></li>
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
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            		<img src="{{ asset('img/logo.png') }}" alt="">
		          			</a>
						</div >
						<!-- /footer logo -->

						<p class="text-justify">Sewakuy adalah website penyewaan barang, bisa menyewakan barang ke orang lain dan bisa menyewa barang milik orang lain.</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6" style="width:500px;">
					
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Layanan Pelanggan</h3>
						<ul class="list-links">
							<li><a href="#">Tentang Kami</a></li>
							<li><a href="#">Kritik & Saran</a></li>
							<li><a href="#">Kebijakan & Privasi</a></li>
							<li><a href="#">Bantuan</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());
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
</body>
@else
<body>
	<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Selamat datang di SewaKuy!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<i class="fa fa-user-circle-o"></i>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> 
								{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
							</a>
							<ul class="custom-menu text-center" >
							<li><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
								<button class="primary-btn" style="font-size: 11px; width: 200px;"><i class="fa fa-sign-out"></i> Logout</button>	
								</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
							</li>
							</ul>
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
						<a class="logo" href="/beranda">
							<img src="{{ asset('img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Sewa barang yuk...">
							<select class="input search-categories" style="width: 155px;">
								<option value="0">Semua Kategori</option>
								<option value="1">Kendaraan</option>
								<option value="2">Elektronik</option>
								<option value="3">Alat Pesta</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<li class="header-cart dropdown default-dropdown text-center">
							<a href="/iklan/tambah" class="dropdown-toggle">
								<span class="tooltipp">Buat Iklan</span>
								<div class="header-btns-icon">
									<i class="fa fa-plus"></i>
								</div>
							</a>	
						</li>
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
										@for ($k = 1; $k <= 4; $k++)
										<div class="product product-widget" style="width: 240px;">
											<div class="product-thumb">
												<img src="{{ asset("img/thumb-product0$k.jpg") }}" alt="">
											</div>
											<div class="product-body">
												<h2 class="product-name font-weak"><a href="#">
													<p style="text-align: justify; font-size: 12px;">
														Mr. X ingin menyewa barang anda. Silakan lanjutkan transaksi dengan Mr. X dengan menekan notifikasi ini. 
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
						<li class="header-cart dropdown default-dropdown text-center">
							<a href="#" class="dropdown-toggle">
								<span class="tooltipp">Pesan</span>
								<div class="header-btns-icon">
									<span class="qty">3</span>
									<i class="fa fa-comments-o"></i>
								</div>	
							</a>
						</li>
						<!-- /Account -->

						<!-- Account -->
						<li class="header-account dropdown default-dropdown text-center">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<span class="tooltipp">Menu</span>
								<div class="header-btns-icon">
									<i class="fa fa-bars"></i><br>
								</div>
							</div>
							<ul class="custom-menu" style="text-align:left;">
								<li><a href="/profil/saya"><i class="fa fa-user-o"></i> Profil Saya</a></li>
								<li><a href="/iklan/saya"><i class="fa fa-heart-o"></i> Iklan Saya</a></li>
								<li><a href="/sewa/saya"><i class="fa fa-check"></i> Daftar Sewa</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Bandingkan</a></li>
								<li><a href="{{ route('logout') }}"
									onclick="event.preventDefault();
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
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
					<ul class="category-list">
					<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Kendaraan <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links" >
											<li><a href="#">Mobil</a></li>
											<li><a href="#">Sepeda Motor</a></li>
											<li><a href="#">Pick Up</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Elektronik <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links">
											<li><a href="#">Laptop</a></li>
											<li><a href="#">Kamera</a></li>
											<li><a href="#">Sound System</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Kebutuhan Pesta <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu" style ="width: 200px;">
								<div class="row">
									<div class="col-md-4" style ="width: 200px;">
										<ul class="list-links">
											<li><a href="#">Alat Pesta</a></li>
											<li><a href="#">Gaun Pesta</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/beranda">Beranda</a></li>
						<li><a href="#">Kendaraan</a></li>
						<li><a href="#">Elektronik</a></li>
						<li><a href="#">Alat Pesta</a></li>
						<li><a href="#">Tentang Kami</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Lainnya <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="product-page.html">Kritik & Saran</a></li>
								<li><a href="product-page.html">Kebijakan & Privasi</a></li>
								<li><a href="products.html">Bantuan</a></li>
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
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="{{ asset('img/logo.png') }}" alt="">
		          </a>
						</div >
						<!-- /footer logo -->

						<p class="text-justify">Sewakuy adalah website penyewaan barang, bisa menyewakan barang ke orang lain dan bisa menyewa barang milik orang lain.</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Menu Saya</h3>
						<ul class="list-links">
							<li><a href="/profil-saya">Profil Saya</a></li>
							<li><a href="/iklan-saya">Iklan Saya</a></li>
							<li><a href="/daftar-sewa">Daftar Sewa</a></li>
							<li><a href="#">Bandingkan</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Layanan Pelanggan</h3>
						<ul class="list-links">
							<li><a href="#">Tentang Kami</a></li>
							<li><a href="#">Kritik & Saran</a></li>
							<li><a href="#">Kebijakan & Privasi</a></li>
							<li><a href="#">Bantuan</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());
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
@endguest
	<!-- jQuery Plugins -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
