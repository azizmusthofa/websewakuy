@php use \App\Http\Controllers\IklanController; @endphp
@extends('layouts.app')
@section('title', 'Daftar Sewa')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form id="checkout-form" class="clearfix">
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title text-center">
							<h3 class="title">Daftar Sewa</h3>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-left">Barang</th>
									<th class="text-center">Tanggal Sewa</th>
									<th class="text-center">Lama Sewa</th>
									<th class="text-center">Total</th>
									<th class="text-center">Status</th>
									<th class="text-center">Opsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tran as $trans)
								<tr>
									@php
									$gambar = IklanController::satuGambar($trans->iklan->id);
									@endphp
									<td class="thumb"><img src="/img/{{$gambar}}" alt=""></td>
									<td class="details">
										<a href="/iklan/detail/{{ $trans->iklan->id }}">{{ $trans->iklan->nama_barang }}</a>
										<ul>
											<li><span>Pengambilan: {{ $trans->pengambilan_barang }}</span></li>	
											<li>Pembayaran: {{$trans->pembayaran}}</li>
										</ul>
									</td>
									<td class="text-center">
										{{ $trans->tanggal_sewa }}<br>
									</td>
									<td class="text-center">
										{{ $trans->lama }} hari<br>
									</td>
									<td class="price text-center">@currency($trans->total)<br></td>
									<td class="text-center">{{$trans->acc}}<br></td>
									<td class="text-center">
										<a href="/iklan/detail/{{ $trans->iklan->id }}" class="main-btn icon-btn"><i class="fa fa-eye"></i></a>
										<a href="/iklan/edit/{{ $trans->iklan->id }}" class="main-btn icon-btn"><i class="fa fa-pencil"></i></button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection