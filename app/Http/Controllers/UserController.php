<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Profil;
use App\PelaporanUser;

class UserController extends Controller
{
    
    public function profilSaya()
    {
        $myId = Auth::id();
        $user = User::find($myId);

        return view('user.registered.profil_user', compact('user', 'myId'));
    }


    public function profilUser($id)
    {
        $user = User::find($id);
        return view('user.registered.profil_user', compact('user'));
    }

    public static function dataUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public static function dataProfil($id)
    {
        $profil = Profil::find($id);
        return $profil;
    }

    public static function namaUser($id)
    {
        $user = User::find($id);
        return $user->name;
    }
    public static function kotaUser($id)
    {
        $user = Profil::find($id);
        return $user->kota;
    }

    public function editProfil($id)
    {
        $user = User::find($id);
        return view('user.registered.edit_profil', compact('user'));
    }

    public function prosesEditProfil(Request $request, $id)
    {  
        $profil = Profil::find($id);
        $user = $profil->user()->update([
             'name'=> $request->name,
             'email'=> $request->email,
        ]);

        if ($request->file != null){
            $file = $request->file('file');
		    $nama_file = $file->getClientOriginalName();
		    $tujuan_upload = 'img';
		    $file->move($tujuan_upload,$nama_file);
            Profil::where('id', $id)->update([
            'jenis_kelamin' => $request->genre, 
            'alamat' => $request->address,
            'kota' => $request->city, 
            'telpon' => $request->telp, 
            'file' => $nama_file
            ]);
        }
        else{
            Profil::where('id', $id)->update([
            'jenis_kelamin' => $request->genre, 
            'alamat' => $request->address,
            'kota' => $request->city, 
            'telpon' => $request->telp, 
            ]);
        }
        return redirect('/profil/saya');    
    }

    public function laporkanUser($id)
    {
        $user = User::find($id);
        return view('user.registered.laporkan_user', compact('user'));
    }

    public function prosesLaporkanUser(Request $request)
    {
        $id = Auth::id();
        $alasan="";
        foreach($request->alasan as $al){
            $alasan = $alasan.$al.',';
        } 
        $lapor = PelaporanUser::create([
            'user_id' => $request->user_id,
            'pelapor_id' => $id,
            'alasan' => $alasan,
            'keterangan' => $request->keterangan,
        ]);
        $user = User::find($request->user_id);
        return view('user.registered.invoice_pelaporan_user', compact('lapor', 'user'));
    }
}
