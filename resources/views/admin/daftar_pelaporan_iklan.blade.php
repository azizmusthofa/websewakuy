@php
use \App\Http\Controllers\IklanController;
use \App\Http\Controllers\UserController;
@endphp
@extends('layouts.app2')
@section('title', 'Daftar Pelaporan Iklan')
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
                            <h3 class="title">Daftar Pelaporan Iklan</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-left">Barang</th>
                                    <th class="text-center">Nama Pemilik</th>
                                    <th class="text-center">Nama Pelapor</th>
                                    <th class="text-center">Alasan</th>
                                    <th class="text-center">Tanggal Pelaporan</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lapor as $pelaporan)
                                @php
                                $iklan = IklanController::dataIklan($pelaporan->iklan_id);
                                $gambar = IklanController::satuGambar($iklan->id);
                                $pemilik = UserController::namaUser($iklan->user_id);
                                $pelapor = UserController::namaUser($pelaporan->pelapor_id);
                                @endphp
                                <tr>
                                    <td class="thumb"><img src="/img/{{$gambar}}" alt=""></td>
                                    <td class="details">
                                        <a href="/iklan/detail/{{ $iklan->id }}">{{ $iklan->nama_barang }}</a>
                                        <ul>
                                            <li><span>Kategori: {{ $iklan->kategori }}</span></li>
                                            @if($iklan->status=='Tersedia')
                                            <li>Status: <strong style="color: green;">Tersedia</strong></li>
                                            @else
                                            <li>Status: <strong style="color: red;">Disewa</strong></li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td class="text-center">{{$pemilik}}<br></td>
                                    <td class="text-center">{{$pelapor}}<br></td>
                                    <td class="text-center">
                                        <p>{{ $pelaporan->alasan }}</p><br>
                                    </td>
                                    <td class="qty text-center">
                                        <p>{{ $pelaporan->created_at }}</p><br>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="main-btn icon-btn"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="main-btn icon-btn"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$lapor->links()}}
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