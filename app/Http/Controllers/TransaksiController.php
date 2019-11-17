<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transaksiSaya()
    {
        return view('user.registered.daftar_sewa');
    }

}
