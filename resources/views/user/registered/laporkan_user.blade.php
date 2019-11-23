@extends('layouts.app')
@section('title', 'Laporkan User')
@section('content')
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row text-center">
			<form action="/lapor/user/create" method="POST" enctype="multipart/form-data" class="clearfix" style="width: 500px; margin-left:auto; margin-right:auto;">
				{{ csrf_field() }}
				<div class="section-title">
					<h3 class="title">Laporkan User</h3>
				</div>
				<input type="hidden" value="{{$user->id}}" name="user_id">
				<div class="billing-details" style="margin-left:auto; margin-right:auto;">
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Nama User :
						<input class="input" type="text" value="{{$user->name}}" name="nama_barang" readonly>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						E-mail :
						<input class="input" type="text" value="{{$user->email}}" name="pemilik" readonly>
					</div>
					<div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
						Alasan Pelaporan :<br>
						<input name="alasan[]" type="checkbox" value="Akun palsu"> Akun palsu <br>
                        <input name="alasan[]" type="checkbox" value="Melakukan penipuan"> Melakukan penipuan <br>
                        <input name="alasan[]" type="checkbox" value="Melakukan tindak kejahatan"> Melakukan tindak kejahatan <br>			
						<input name="alasan[]" type="checkbox" value="Tidak menanggapi permintaan sewa"> Tidak menanggapi permintaan sewa <br>                       
                        <input name="alasan[]" type="checkbox" value="Merusak barang sewaan"> Merusak barang sewaan <br>
                        <input name="alasan[]" type="checkbox" value="Melanggar kesepakatan"> Melanggar kesepakatan <br>
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