@extends('layouts.app')
@section('title', 'Buat Iklan')
@section('content')
<div class="section text-center">
	<div class="container text-center">
		<form action="/iklan/create" method="POST" enctype="multipart/form-data" class="clearfix" style="width: 500px; margin-left:auto; margin-right:auto;">
				{{ csrf_field() }}	
					<div class="section-title">
						<h3 class="title">Buat Iklan</h3>
					</div>
					<div class="col-md-6">
						<div class="billing-details" style="margin-left:auto; margin-right:auto;">
							<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
								Kategori :
								<select class="input" type="text" name="kategori">
										<option>Kendaraan</option>
										<option>Elektronik</option>
										<option>Alat Pesta</option>
								</select>
							</div>
							<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
									Nama Barang :
								<input class="input" type="text" placeholder="Nama Barang" name="nama_barang">
							</div>
							<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
									Harga Sewa :
								<input class="input" type="price" placeholder="Harga Sewa" name="harga_sewa">
							</div>
							<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
									Deskripsi Barang :
								<textarea class="input" name="deskripsi" type="text" placeholder="Deskripsi Barang" style="height: 200px;"></textarea>
							</div>
							<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
									Foto Barang : <input type="file" name="file">
							</div>
								<input type="submit" class="primary-btn add-to-cart" value="Buat Iklan" style="margin-left:200px;">
						</div>						
					</div>
			</form>
	</div>
</div>
@endsection
