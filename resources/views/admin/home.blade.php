@extends('layouts.app2')
@section('title', 'Beranda Admin')
@section('content')
<!-- HOME -->
<div id="home">
	<!-- container -->
	<div class="container">
		<!-- home wrap -->
		<div class="home-wrap">
			<!-- home slick -->
			<div id="home-slick">
				@for ($k = 1; $k <= 3; $k++) <!-- banner -->
					<div class="banner banner-1">
						<img src="./img/banner0{{$k}}.jpg" alt="">
						<div class="banner-caption text-center">
							<h1 style="font-size:60px; color:#F8694A; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
								Beranda Administrator</h1>
							<h3 class="white-color font-weak" style="text-shadow: -1px 0 grey, 0 1px grey, 1px 0 grey, 0 -1px grey;">
								SewaKuy</h3>
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
@endsection