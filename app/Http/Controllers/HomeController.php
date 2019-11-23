<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Iklan;
use App\Notifikasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $kategori = array(
            array('Kendaraan', 'kendaraan.jpg'),
            array('Elektronik', 'elektronik.jpg'),
            array('Alat Pesta', 'pesta.jpg')
        );

        $elektronik = Iklan::where('kategori','Elektronik')->where('status', 'Tersedia')->paginate(4);
        $kendaraan = Iklan::where('kategori', 'Kendaraan')->where('status', 'Tersedia')->paginate(4);
        $pesta = Iklan::where('kategori', 'Alat Pesta')->where('status', 'Tersedia')->paginate(4);
        $iklan = array($kendaraan, $elektronik, $pesta);

        if (auth()->user()->is_admin == 1) {
            return view('admin.home');
        } else {
            return view('user.registered.home', compact('kategori', 'iklan'));
        }
    }

    public function pencarian(Request $request)
    {
        $key = $request->key;
        if ($request->kategori == 0) {
            $kategori = 'semua kategori';
        } elseif ($request->kategori == 1) {
            $kategori = 'kategori kendaraan';
        } elseif ($request->kategori == 2) {
            $kategori = 'kategori elektronik';
        }else{
            $kategori = 'kategori alat pesta';
        }

        $hasil = Iklan::where('nama_barang', 'like', '%' . $key . '%')->where('status', 'Tersedia')->paginate(12);
        return view('user.registered.pencarian', compact('hasil', 'key', 'kategori'));
    }

    public function perKategori($key)
    {
        $title = $key;
        $kategori = Iklan::where('kategori', $key)->where('status', 'Tersedia')->paginate(16);
        return view('user.registered.per_kategori', compact('kategori', 'title'));
    }
}
