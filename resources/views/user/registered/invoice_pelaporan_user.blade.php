@php
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
$myId = Auth::id();
$pelapor = UserController::namaUser($myId);
$alasans = explode (",", $lapor->alasan);
@endphp
@extends('layouts.app3')
@section('title', 'Invoice Pelaporan')
@section('content')
<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row text-center" style="width:500px;margin-left:auto; margin-right:auto;">
        <div class="section-title">
            <h3 class="title">Invoice Pelaporan User</h3>
        </div>
        <div class="billing-details" style="margin-left:auto; margin-right:auto;">
            <h4>Informasi User</h4>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Nama User :<br>
                <h4>{{$user->name}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                E-mail :<br>
                <h4>{{$user->email}}</h4>
            </div>
            <hr>
            <h4>Detail Pelaporan</h4>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Nama Pelapor :<br>
                <h4>{{$pelapor}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Alasan Pelaporan :<br>
                <ul>
                    @foreach($alasans as $alasan)
                    @if($alasan != null)
                    <li>
                        <h5>- {{$alasan}}</h5>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Keterangan :<br>
                <h5>
                    @if($lapor->keterangan != null)
                    <p class="text-justifiy">{{$lapor->keterangan}}</p>
                    @else
                    Tidak ada keterangan
                    @endif
                </h5>
            </div>
        </div>
        <hr><br>
        <a href="#" class="primary-btn add-to-cart"><i class="fa fa-print"></i> Cetak Langsung</a>
        <a href="#" class="primary-btn add-to-cart"><i class="fa fa-download"></i> Download PDF</a>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection