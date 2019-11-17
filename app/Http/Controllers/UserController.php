<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Profil;
use DB;

class UserController extends Controller
{
    
    public function profilSaya()
    {
        $id = Auth::id();
        $user = User::find($id);

        return view('user.registered.profil_saya', compact('user'));
    }


    public function profilUser($id)
    {
        $user = User::find($id);
        return view('user.registered.profil_user', compact('user'));
    }

    public static function namaUser($id)
    {
        $user = User::find($id);
        return $user->name;
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
}
