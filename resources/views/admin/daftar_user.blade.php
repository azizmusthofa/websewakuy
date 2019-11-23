@extends('layouts.app2')
@section('title', 'Daftar User')
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
							<h3 class="title">Daftar User</h3>
						</div>

						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-left">Nama</th>
									<th class="text-center">Tanggal Pendaftaran</th>
									<th class="text-center">Alamat</th>
									<th class="text-center">No. Telpon</th>
									<th class="text-center">Opsi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $users)
								<tr>
									<td class="thumb"><img src="{{ url('/img/'.$users->profil->file) }}" alt=""></td>
									<td class="details">
										<a href="/dafar/user/{{ $users->id }}">{{ $users->name }}</a>
										<ul>
											<li><span>Email: {{ $users->email }}</span></li>
											@if($users->profil->jenis_kelamin=='Laki-laki')
											<li>Status: <strong style="color: green;">Laki-laki</strong></li>
											@else
											<li>Status: <strong style="color: red;">Perempuan</strong></li>
											@endif
										</ul>
									</td>
									<td class="qty text-center">
										<p>{{ $users->created_at }}</p><br>
									</td>
									<td class="qty text-center">
										<p>{{$users->profil->alamat}}, {{$users->profil->kota}}</p><br>
									</td>
									<td class="qty text-center">
										<p>{{ $users->profil->telpon }}</p><br>
									</td>
									<td class="qty text-center">
										<a href="/daftar/user/{{ $users->id }}" class="main-btn icon-btn"><i class="fa fa-eye"></i></a>
										<a href="/user/delete/{{ $users->id }}" class="main-btn icon-btn"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$user->links()}}
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