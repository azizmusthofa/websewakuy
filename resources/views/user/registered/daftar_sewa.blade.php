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
										<th class="text-center">Harga Sewa</th>
										<th class="text-center">Lama Sewa</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                @for($i = 1; $i <= 4; $i++)
									<tr>
										<td class="thumb"><img src="./img/thumb-product0{{$i}}.jpg" alt=""></td>
										<td class="details">
											<a href="#">Kamera Canon C1000</a>
											<ul>
												<li><span>Tanggal Sewa: 09/11/2019</span></li>
												<li><span>Status: Sudah dikembalikan</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong>Rp30.000</strong><br></td>
										<td class="qty text-center">5 hari</td>
                                        <td class="total text-center"><strong class="primary-color">Rp150.000</strong></td>
                                        <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-eye"></i></button></td>
                                    </tr>
                                 @endfor   
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