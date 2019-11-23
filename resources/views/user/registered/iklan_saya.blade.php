@extends('layouts.app')
@section('title', 'Iklan Saya')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form id="checkout-form" class="clearfix">
				<div class="col-md-12">
					<div class="order-summary clearfix">
						<a href="/iklan/tambah" class="primary-btn add-to-cart" style="position: absolute;">
							<i class="fa fa-plus"></i> Tambah Iklan</a>
						<div class="section-title text-center">
							<h3 class="title">Iklan Saya</h3>
						</div>

						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-left">Barang</th>
									<th class="text-center">Tanggal Pembuatan</th>
									<th class="text-center">Harga Sewa</th>
									<th class="text-center">Opsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($iklan as $iklans)
								<tr>
									<td class="thumb"><img src="{{ url('/img/'.$iklans->gambar[0]->file) }}" alt=""></td>
									<td class="details">
										<a href="/iklan/detail/{{ $iklans->id }}">{{ $iklans->nama_barang }}</a>
										<ul>
											<li><span>Kategori: {{ $iklans->kategori }}</span></li>
											@if($iklans->status=='Tersedia')
											<li>Status: <strong style="color: green;">Tersedia</strong></li>
											@else
											<li>Status: <strong style="color: red;">Disewa</strong></li>
											@endif
										</ul>
									</td>
									<td class="qty text-center">
										{{ $iklans->created_at }}<br>
									</td>
									<td class="price text-center">@currency($iklans->harga_sewa)<br></td>
									<td class="text-center">
										<a href="/iklan/detail/{{ $iklans->id }}" class="main-btn icon-btn"><i class="fa fa-eye"></i></a>
										<a href="/iklan/edit/{{ $iklans->id }}" class="main-btn icon-btn"><i class="fa fa-pencil"></i></button>
											<a href="/iklan/delete/{{ $iklans->id }}" class="main-btn icon-btn"><i class="fa fa-trash"></i></a>
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