@php
use \App\Http\Controllers\UserController;
$pemilik = UserController::namaUser($iklan->user_id);
@endphp
@extends('layouts.app')
@section('title', 'Laporkan Iklan')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row text-center">
			<form action="/lapor/iklan/create" method="POST" enctype="multipart/form-data" class="clearfix" style="width: 500px; margin-left:auto; margin-right:auto;">
				{{ csrf_field() }}
				<div class="section-title">
					<h3 class="title">Laporkan Iklan</h3>
				</div>
				<input type="hidden" value="{{$iklan->id}}" name="iklan_id">
				<div class="billing-details" style="margin-left:auto; margin-right:auto;">
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Nama Barang :
						<input class="input" type="text" value="{{$iklan->nama_barang}}" name="nama_barang" readonly>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Pemilik :
						<input class="input" type="text" value="{{$pemilik}}" name="pemilik" readonly>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Alasan Pelaporan :<br>
						<input name="alasan[]" type="checkbox" value="Barang tidak sesuai deskripsi"> Barang tidak sesuai deskripsi <br>
						<input name="alasan[]" type="checkbox" value="Konten menyinggung"> Konten menyinggung <br>			
						<input name="alasan[]" type="checkbox" value="Iklan penipuan"> Iklan penipuan <br>
						<input name="alasan[]" type="checkbox" value="Pemilik iklan tidak merespon"> Pemilik iklan tidak merespon <br>
						<input type="checkbox" checked> Lainnya 
						<input class="input" type="text" name="alasan[]" placeholder="Penjelasan alasan lainnya"><br>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Keterangan Tambahan (optional):
						<textarea class="input" name="keterangan" type="text" style="height: 200px;"></textarea>
					</div>
				</div>
				<input type="submit" class="primary-btn add-to-cart" value="Kirim" style="margin-left:auto; margin-right:auto">
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection