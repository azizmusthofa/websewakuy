<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Iklan;

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
            array('Alat Pesta', 'pesta.jpg'));
        
        $elektronik = Iklan::where('kategori', 'Elektronik')->paginate(4);
        $kendaraan = Iklan::where('kategori', 'Kendaraan')->paginate(4);
        $pesta = Iklan::where('kategori', 'Alat Pesta')->paginate(4);
        $iklan = array($kendaraan, $elektronik, $pesta);

        if(Auth::guest()){
            return view('user.unregitered.home', compact('kategori', 'iklan'));
        }else{
            return view('user.registered.home', compact('kategori', 'iklan'));
        }
    }

}
