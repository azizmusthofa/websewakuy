@php
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
$myId = Auth::id();
$saya = UserController::namaUser($myId);
$pemilik = UserController::namaUser($iklan->user_id);
$kota = UserController::kotaUser($myId);
@endphp
@extends('layouts.app3')
@section('title', 'Checkout Penyewaan Barang')
@section('content')
<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row text-center" style="width:500px;margin-left:auto; margin-right:auto;">
        <div class="section-title">
            <h3 class="title">Checkout Penyewaan Barang</h3>
        </div>
        <div class="billing-details" style="margin-left:auto; margin-right:auto;">
            <h4>Informasi Penyewa</h4>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Nama :<br>
                <h4>{{$saya}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Alamat :<br>
                <h4>{{$kota}}</h4>
            </div>
            <hr>
            <h4>Informasi Transaksi</h4>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Nama Barang :<br>
                <h4>{{$iklan->nama_barang}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Tanggal Sewa :<br>
                <h4>{{$transaksi->tanggal_sewa}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Cara Transaksi Barang :<br>
                <h4>{{$transaksi->pengambilan_barang}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Cara Pembayaran :<br>
                <h4>{{$transaksi->pembayaran}}</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Harga Sewa :<br>
                <h4>@currency($iklan->harga_sewa)/hari</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                Lama Sewa :<br>
                <h4>{{$transaksi->lama}} hari</h4>
            </div>
            <div class="form-group" style="width: 400px; margin-left: 50px; text-align:left">
                <strong>Total</strong> :<br>
                <h3>@currency($transaksi->total),00</h3>
            </div>
        </div>
        <hr><br>
        <form action="/sewa/kirim" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="tran_id" value="{{$transaksi->id}}">
            <input type="hidden" name="user_id" value="{{$iklan->user_id}}">
            <input type="hidden" name="penyewa" value="{{$saya}}">
            <input type="hidden" name="barang" value="{{$iklan->nama_barang}}">
            <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-paper-plane"></i> Kirim Permintaan</button>
            <a href="#" class="primary-btn add-to-cart"><i class="fa fa-remove"></i> Batal</a>
        </form>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection