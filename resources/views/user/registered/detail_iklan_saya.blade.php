@php use \App\Http\Controllers\UserController;@endphp
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
									@for($k=1; $k<=5; $k++)
										@if($k <= $rata2Rating)
										<i class="fa fa-star"></i>
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
                            @php $pemilik = UserController::namaUser($iklan->user_id);@endphp
							<p><strong>Pemilik: </strong><a href="./profil/{{$iklan->user_id}}">{{ $pemilik }}</a></p>
							<p><strong>Kategori: </strong>{{ $iklan->kategori }}</p>
							<p><strong>Deskripsi: </strong></p>
							<p class="text-justifiy">{{ $iklan->deskripsi }}</p>
							
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
															@for($x=1; $x<=5; $x++)
																@if($x <= $ulas->rating)
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
										<div class="col-md-6">
											
										</div>
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