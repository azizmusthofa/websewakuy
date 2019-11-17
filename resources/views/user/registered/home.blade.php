@php use \App\Http\Controllers\IklanController;@endphp
@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
				@for ($k = 1; $k <= 3; $k++)
					<!-- banner -->
					<div class="banner banner-1">
						<img src="./img/banner0{{$k}}.jpg" alt="">
						<div class="banner-caption text-center">
							<h1 style="font-size:60px; color:#F8694A; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
								Selamat Datang Di SewaKuy</h1>
							<h3 class="white-color font-weak" style="text-shadow: -1px 0 grey, 0 1px grey, 1px 0 grey, 0 -1px grey;">
								Nikmati Layanan Penyewaan Barang Disini...</h3>
						</div>
					</div>
					<!-- /banner -->
				@endfor
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->
	<!-- /section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Kategori</h2>
				</div>
			</div>
			@for ($n = 0; $n < 3; $n++)
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/{{ $kategori[$n][1] }}" alt="">
						</div>
						<div class="shop-body">
							<h3>{{ $kategori[$n][0] }}<br><br></h3>
							<a href="#" class="cta-btn">Sewa <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /banner -->
			@endfor
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
<div class="section">
		<!-- container -->
		<div class="container">
			@for ($k = 0; $k < 3; $k++)	
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">{{ $kategori[$k][0] }}</h2>
					</div>
				</div>
				<!-- section title -->
                @foreach($iklan[$k] as $iklans)
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><a href="/iklan/detail/{{ $iklans->id }}"><i class="fa fa-search-plus"></i> Lihat Detail</a></button>
							<img src="{{ url('/img/'.$iklans->gambar[0]->file) }}" alt="" class="img-responsive" style="height: 200px;">
						</div>
						<div class="product-body" >
							<h2 class="product-name" style="font-size: 20px;"><a href="/iklan/detail/{{ $iklans->id }}">{{$iklans->nama_barang}}</a></h2>
							<i class="fa fa-map-marker" style="color: red;"></i>
							<h5 class="product-price" style="font-size: 12px;"><a href="#" style="color: grey;"> Malang</a></h5><br>
							<h5 class="product-price">Rp</h5>
							<h4 class="product-price">@currency($iklans->harga_sewa)</h4>
							<h5 class="product-price">/hari</h5>
							<div class="product-rating">
								@php
									$avg = IklanController::akumulasiRating($iklans->id);	
								@endphp
									@for($s=1; $s<=5; $s++)
										@if($s <= $avg)
										<i class="fa fa-star"></i>
										@else
											@if($avg >= ($s-0.5))
												<i class="fa fa-star-half"></i>
											@else
												<i class="fa fa-star-o empty"></i>
											@endif
										@endif
									@endfor
									<strong> {{$avg}}</strong>
							</div><br>
							<h5 class="product-price" style="font-size: 10px;"><p style="color: grey;"> {{$iklans->suka}} suka</p></h5>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><a href="/iklan/detail/{{ $iklans->id }}" style="color:white;"><i class="fa fa-shopping-cart"></i> Sewa</a></button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				@endforeach
			</div>
			{{$iklan[$k]->links()}}
			<br><br><br>
			<!-- /row -->
			@endfor
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection