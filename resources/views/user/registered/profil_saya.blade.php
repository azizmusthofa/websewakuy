@extends('layouts.app')
@section('title', 'Profil Saya')
@section('content')
<div class="section">
    <div class="section-title text-center">
		<h3 class="title">Profil Saya</h3>
    </div>
		<!-- container -->
<div class="container">
    <div class="profile">
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
				<hr>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
						<ul class="nav">
							<li  class="active">
								<a href="/profil">
								<i class="fa fa-user"></i>
								Informasi Umum </a>
							</li>
							<li>
							<a href="/profil/edit/{{ $user->id }}">
								<i class="fa fa-pencil"></i>
								Edit Profil </a>
							</li>
						</ul>
					</div>
				<!-- END MENU -->
				<hr>
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                Nama Lengkap:
                <h3>{{ $user->name }}</h3><hr>
                
                E-mail:
                <h3>{{ $user->email }}</h3><hr>
                
                Jenis Kelamin:
                <h3>{{ $user->profil->jenis_kelamin }}</h3><hr>
                
                Alamat:
				<h3>{{ $user->profil->alamat }}</h3><hr>
				
				Kabupaten/Kota:
                <h3>{{ $user->profil->kota }}</h3><hr>
                
                Nomor Telpon:
                <h3>{{ $user->profil->telpon }}</h3><hr>
                
			</div>
		</div>
	</div>
</div>
</div>
@endsection