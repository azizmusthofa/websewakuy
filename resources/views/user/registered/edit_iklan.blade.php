@extends('layouts.app')
@section('title', 'Edit Iklan')
@section('content')
<div class="section text-center">
	<div class="container text-center">
		<div class="col-md-5">
			<form action="/iklan/update" method="POST" enctype="multipart/form-data" class="clearfix" style="width: 500px; margin-left:auto; margin-right:auto;">
				{{ csrf_field() }}
				<div class="section-title">
					<h3 class="title">Edit Iklan</h3>
				</div>
				<input type="hidden" value="{{$iklan->id}}" name="iklan_id">
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
						<input class="input" type="text" value="{{$iklan->nama_barang}}" name="nama_barang">
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Harga Sewa :
						<input class="input" type="price" value="{{$iklan->harga_sewa}}" name="harga_sewa">
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Deskripsi Barang :
						<textarea class="input" name="deskripsi" type="text" style="height: 200px;">{{$iklan->deskripsi}}</textarea>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Foto Barang : <input type="file" name="file">
						<hr>
					</div>
					<input type="submit" class="primary-btn add-to-cart" value="Simpan Perubahan" style="margin-left:auto; margin-right:auto">
				</div>

			</form>
		</div>
		<div class="col-md-5"></div>
		<table class="shopping-cart-table table" style="width: 500px; margin-left:auto; margin-right:auto;text-align:left;">
			<thead>
				<tr>
					<th class="text-center">Foto Barang</th>
					<th class="text-left">Opsi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($iklan->gambar as $img)
				<tr>
					<td class="text-center"><img width="150px" src="{{ url('/img/'.$img->file) }}"></td>
					<td><a class="btn btn-danger" href="/iklan/gambar/delete/{{ $img->id }}">Hapus</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>
@endsection