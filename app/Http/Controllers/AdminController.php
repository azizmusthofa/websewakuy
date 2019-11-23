<?php

namespace App\Http\Controllers;
use App\Iklan;
use App\User;
use App\PelaporanUser;
use App\PelaporanIklan;

class AdminController extends Controller
{
    public function daftarUser()
    {
        $user = User::paginate(10);
        return view('admin.daftar_user', compact('user'));
    }

    public function daftarIklan()
    {
        $iklan = Iklan::paginate(10);
        return view('admin.daftar_iklan', compact('iklan'));
    }

    public function daftarPelaporanIklan()
    {
        $lapor = PelaporanIklan::paginate(10);
        return view('admin.daftar_pelaporan_iklan', compact('lapor'));
    }

    public function daftarPelaporanUser()
    {
        $lapor = PelaporanUser::paginate(10);
        return view('admin.daftar_pelaporan_user', compact('lapor'));
    }
}
