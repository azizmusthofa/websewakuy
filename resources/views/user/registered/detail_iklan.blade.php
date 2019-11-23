@php
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
$myId = Auth::id();
$pemilik = UserController::namaUser($iklan->user_id);
$kota = UserController::kotaUser($myId);
@endphp
@extends('layouts.app')
@section('title', 'Detail Iklan')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--  Product Details -->
			<div class="product product-details clearfix">
				<div class="col-md-6">
					<div id="product-main-view">
						@foreach ($iklan->gambar as $img)
						<div class="product-view">
							<img src="{{ url('/img/'.$img->file) }}" alt="" class="img-responsive">
						</div>
						@endforeach
					</div>
					<div id="product-view">
						@foreach ($iklan->gambar as $img)
						<div class="product-view">
							<img src="{{ url('/img/'.$img->file) }}" alt="" class="img-responsive">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-body">
						<h2 class="product-name">{{ $iklan->nama_barang }}</h2>
						<h3 class="product-price">@currency($iklan->harga_sewa) /hari</h3>
						<div>
							<div class="product-rating">
								@for($k=1; $k<=5; $k++) @if($k <=$rata2Rating) <i class="fa fa-star"></i>
									@else
									@if($rata2Rating >= ($k-0.5))
									<i class="fa fa-star-half"></i>
									@else
									<i class="fa fa-star-o empty"></i>
									@endif
									@endif
									@endfor
									<strong>{{ $rata2Rating }}</strong>
							</div>
							<a href="#" style="color: gray">({{ $ulasan->total() }} Ulasan)</a>
						</div>
						@if($iklan->status=='Tersedia')
						<p><strong>Status:</strong><strong style="color: green;"> Tersedia</strong></p>
						@else
						<p><strong>Status:</strong><strong style="color: red;"> Disewa</strong></p>
						@endif
						<p><strong>Pemilik: </strong><strong><a href="/profil/{{$iklan->user_id}}">{{ $pemilik }}</a></strong></p>
						<p><strong>Kategori: </strong>{{ $iklan->kategori }}</p>
						<p><strong>Deskripsi: </strong></p>
						<p class="text-justifiy">{{ $iklan->deskripsi }}</p>
						<script src="{{ asset('js/jquery.min.js') }}"></script>
						<script type="text/javascript">
							$(document).ready(function() {
								$("#tran").on("click", "a", function(e) {
									e.preventDefault();
									var $this = $(this).parent();
									$this.addClass("active").siblings().removeClass("active");
									$("#transaksi").val($this.data("value"));
								})
								$("#bayar").on("click", "a", function(e) {
									e.preventDefault();
									var $this = $(this).parent();
									$this.addClass("active").siblings().removeClass("active");
									$("#byr").val($this.data("value"));
								})
							});
						</script>
						@if($iklan->user_id != $myId)
						<form action="/iklan/sewa" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="product-options">
								<ul id="tran" class="size-option">
									<li><span class="text-uppercase">Transaksi Barang:</span></li>
									<li data-value="COD"><a href="#">COD</a></li>
									<li data-value="Diantar"><a href="#">Diantar</a></li>
									<li data-value="Diambil"><a href="#">Diambil</a></li>
								</ul>
								
								<ul id="bayar" class="size-option">
									<li><span class="text-uppercase">Pembayaran:</span></li>
									<li data-value="Diawal"><a href="#">Diawal</a></li>
									<li data-value="DP 50%"><a href="#">DP 50%</a></li>
									<li data-value="Diakhir"><a href="#">Diakhir</a></li>
								</ul>
								
							</div>
							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">Tanggal Sewa:</span>
									<input class="form-group" name="tgl_sewa" type="date" placeholder="Tanggal Sewa"><br>
									<span class="text-uppercase">Lama Sewa:</span>
									<input class="form-group" name="lama" type="number" placeholder="Lama Sewa"> HARI
								</div><br><br>
								<input type="hidden" name="tran" id="transaksi" />
								<input type="hidden" name="bayar" id="byr" />
								<input type="hidden" name="iklan_id" value="{{$iklan->id}}" />
								<button class="primary-btn add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i> Sewa</button><span> </span>
								<button class="primary-btn add-to-cart"><i class="fa fa-comment"></i> Kirim Pesan</button><span> </span>
								<a href="/iklan/lapor/{{$iklan->id}}" class="primary-btn add-to-cart"> Laporkan Iklan</a>

							</div>
						</form>
						@endif
					</div>
				</div>
				<div class="col-md-12">
					<div class="product-tab">
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Ulasan ({{ $ulasan->total() }})</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-6">
										<div class="product-reviews">
											@foreach($ulasan as $ulas)
											<div class="single-review">
												<div class="review-heading">
													<div><a href="#"><i class="fa fa-user-o"></i> {{ $ulas->nama }}</a></div>
													<div><a href="#"><i class="fa fa-clock-o"></i> {{ $ulas->created_at }}</a></div>
													<div class="review-rating pull-right">
														@for($x=1; $x<=5; $x++) @if($x <=$ulas->rating)
															<i class="fa fa-star"></i>
															@else
															<i class="fa fa-star-o empty"></i>
															@endif
															@endfor
													</div>
												</div>
												<div class="review-body">
													<p>{{ $ulas->isi }}</p>
												</div>
											</div>
											@endforeach
											{{ $ulasan->links() }}

										</div>
									</div>
									@if($iklan->user_id != $myId)
									<div class="col-md-6">
										<h4 class="text-uppercase">Tulis Ulasan Anda</h4>
										<p>Email anda tidak akan dipublikasi</p>
										<form class="review-form" action="/iklan/ulasan/tambah/{{ $iklan->id }}">
											<div class="form-group">
												<input class="input" name="nama" type="text" placeholder="Nama" />
											</div>
											<div class="form-group">
												<input class="input" name="email" type="email" placeholder="Email" />
											</div>
											<div class="form-group">
												<textarea class="input" name="isi" placeholder="Isi Ulasan"></textarea>
											</div>
											<div class="form-group">
												<div class="input-rating">
													<strong class="text-uppercase">Rating: </strong>
													<div class="stars">
														<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
														<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
														<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
														<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
														<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
													</div>
												</div>
											</div>
											<button class="primary-btn">Kirim</button>
										</form>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /Product Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection