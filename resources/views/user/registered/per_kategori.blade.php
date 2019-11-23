@php
use \App\Http\Controllers\IklanController;
use \App\Http\Controllers\UserController;
@endphp
@extends('layouts.app')
@section('title', $title)
@section('content')
<!-- section -->
<div class="section">
    <!-- section title -->
    <div class="col-md-12">
        <div class="section-title text-center">
            <h2 class="title">{{ $title }}</h2>
        </div>
    </div>
    <!-- section title -->
    <!-- container -->
    @if($kategori->count() != 0)
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- MAIN -->
            <!-- store top filter -->
            <div class="store-filter clearfix">
                <div class="pull-left">
                    <div class="row-filter">
                        <a href="#"><i class="fa fa-th-large"></i></a>
                        <a href="#" class="active"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="sort-filter">
                        <span class="text-uppercase">Urutkan berdasarkan:</span>
                        <select class="input" style="width:130px;">
                            <option value="0">Harga Sewa</option>
                            <option value="1">Nama Barang</option>
                            <option value="2">Rating</option>
                        </select>
                        <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                    </div>
                </div>
                <div class="pull-right">
                    <ul class="store-pages">
                        {{$kategori->links()}}
                    </ul>
                </div>
            </div>
            <!-- /store top filter -->

            <!-- STORE -->
            <div id="store">
                <!-- row -->
                <div class="row">
                    @foreach($kategori as $iklans)
                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                @php
                                $gambar = IklanController::satuGambar($iklans->id);
                                $kota = UserController::kotaUser($iklans->user_id);
                                $avg = IklanController::akumulasiRating($iklans->id);
                                @endphp
                                <button class="main-btn quick-view"><a href="/iklan/detail/{{ $iklans->id }}"><i class="fa fa-search-plus"></i> Lihat Detail</a></button>
                                <img src="/img/{{$gambar}}" alt="" class="img-responsive" style="height: 200px;">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name" style="font-size: 20px;"><a href="/iklan/detail/{{ $iklans->id }}">{{$iklans->nama_barang}}</a></h2>
                                <i class="fa fa-map-marker" style="color: red;"></i>
                                <h5 class="product-price" style="font-size: 12px;"><a style="color: grey;"> {{$kota}}</a></h5><br>
                                <h5 class="product-price">Rp</h5>
                                <h4 class="product-price">@currency($iklans->harga_sewa)</h4>
                                <h5 class="product-price">/hari</h5>
                                <div class="product-rating">
                                    @for($s=1; $s<=5; $s++) @if($s <=$avg) <i class="fa fa-star"></i>
                                        @else
                                        @if($avg >= ($s-0.5))
                                        <i class="fa fa-star-half"></i>
                                        @else
                                        <i class="fa fa-star-o empty"></i>
                                        @endif
                                        @endif
                                        @endfor
                                        <strong> {{$avg}}</strong>
                                </div><br>
                                <h5 class="product-price" style="font-size: 10px;">
                                    <p style="color: grey;"> {{$iklans->suka}} suka</p>
                                </h5>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><a href="/iklan/detail/{{ $iklans->id }}" style="color:white;"><i class="fa fa-shopping-cart"></i> Sewa</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /STORE -->

            <!-- store bottom filter -->
            <div class="store-filter clearfix">
                <div class="pull-left">
                    <div class="row-filter">
                        <a href="#"><i class="fa fa-th-large"></i></a>
                        <a href="#" class="active"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="sort-filter">
                        <span class="text-uppercase">Urutkan berdasarkan:</span>
                        <select class="input" style="width:130px;">
                            <option value="0">Harga Sewa</option>
                            <option value="1">Nama Barang</option>
                            <option value="2">Rating</option>
                        </select>
                        <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                    </div>
                </div>
                <div class="pull-right">
                    <ul class="store-pages">
                        {{$kategori->links()}}
                    </ul>
                </div>
            </div>
            <!-- /store bottom filter -->

            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    @endif
    <!-- /container -->
</div>
<!-- /section -->
@endsection