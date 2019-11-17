@extends('layouts.app')
@section('title', 'Edit Profil')
@section('content')
<div class="section">
    <div class="section-title text-center">
		<h3 class="title">Edit Profil</h3>
    </div>
		<!-- container -->
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ url('/img/'.$user->profil->file) }}" class="img-responsive">
				</div>
				
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->name }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="/profil">
							<i class="fa fa-user"></i>
							Informasi Umum </a>
						</li>
						<li  class="active">
							<a href="/profil/edit/{{ $user->id }}">
							<i class="fa fa-pencil"></i>
							Edit Profil </a>
                        </li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<form action="/profil/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
				Nama Lengkap:<br>
                <input class="input" type="text" value="{{ $user->name }}" name="name"><br><br>
                E-mail:<br>
                <input class="input" type="email" value="{{ $user->email }}" name="email"><br><br>
                Jenis Kelamin:<br>
                <select class="input" type="text" name="genre" value="{{ $user->profil->jenis_kelamin }}">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                </select><br><br>
                Alamat:<br>
				<input class="input" type="text" value="{{ $user->profil->alamat }}" name="address"><br><br>
				Kabupaten/Kota:<br>
                <select class="input" type="text" name="city" value="{{ $user->profil->kota }}">
                        <option>Kota Malang</option>
						<option>Kab. Malang</option>
						<option>Kota. Batu</option>
                </select><br><br>
                Nomor Telpon:<br>
				<input class="input" type="text" value="{{ $user->profil->telpon }}" name="telp"><br><br>
				Ubah Foto : <input type="file" name="file" ><br><br>
                <input type="submit" class="primary-btn add-to-cart" value="Simpan">
                </form>
            </div>
		</div>
	</div>
</div>
</div>
@endsection