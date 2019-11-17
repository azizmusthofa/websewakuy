<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Iklan;
use App\Gambar;
use App\Ulasan;

class IklanController extends Controller
{
    public function detailIklan($id)
    {
        $iklan = Iklan::find($id);
        $ulasan = Ulasan::where('iklan_id', $iklan->id)->paginate(3);
        $rata2Rating = $this->akumulasiRating($iklan->id);
        if($id = Auth::id()){
            return view('user.registered.detail_iklan_saya', compact('iklan', 'ulasan', 'rata2Rating'));
        }else{
            return view('user.registered.detail_iklan', compact('iklan', 'ulasan', 'rata2Rating'));
        }
    }

    public static function akumulasiRating($id){
        $ulasan = Ulasan::where('iklan_id', $id)->get();
        $n = count($ulasan);
		$sum = 0;
		for($i=0; $i<$n; $i++){
			$sum += $ulasan[$i]->rating;
        }
        if($n != 0){
            $avg = number_format(($sum/$n), 1);
        }
        else{
            $avg = number_format(($sum/5), 1);
        }
        
        return $avg;
    }

    public function iklanSaya()
    {
        $id = Auth::id();
        $iklan = Iklan::where('user_id', $id)->get();
        return view('user.registered.iklan_saya', compact('iklan'));
    }

    public function editIklan($id)
    {
        $iklan = Iklan::find($id);
        return view('user.registered.edit_iklan', compact('iklan'));
    }
    
    public function buatIklan()
    {   
        return view('user.registered.buat_iklan');
    } 
    
    public function prosesBuatIklan(Request $request){
        $id = Auth::id();

        $iklan = Iklan::create([
            'user_id' => $id,
            'kategori' => $request->kategori,
            'nama_barang' => $request->nama_barang,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
            'status' => 'Tersedia',
            'suka' => 0,
        ]);

        $file = $request->file('file');
		$nama_file = $file->getClientOriginalName();
		$tujuan_upload = 'img';
		$file->move($tujuan_upload,$nama_file);

        $gambar = new Gambar();
        $gambar->iklan_id = $iklan->id;
        $gambar->file = $nama_file;
        $gambar->save();
 
		return redirect('/iklan/saya');
	}

    public function prosesEditIklan(Request $request){
        $id = $request->iklan_id;
        Iklan::where('id', $id)->update([
            'kategori' => $request->kategori,
            'nama_barang' => $request->nama_barang,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->file != null){
            $file = $request->file('file');
		    $nama_file = $file->getClientOriginalName();
		    $tujuan_upload = 'img';
		    $file->move($tujuan_upload,$nama_file);

            $gambar = new Gambar();
            $gambar->iklan_id = $id;
            $gambar->file = $nama_file;
            $gambar->save();
        }
        return redirect('/iklan/saya');
    }

    public function hapusGambar($id)
    {
        $gambar = Gambar::find($id);
        $gambar->delete();
        return redirect()->back();
    }

    public function hapusIklan($id)
    {
        $gambar = Iklan::find($id);
        $gambar->delete();
        return redirect()->back();
    }

    public function tambahUlasan(Request $request, $id)
    {
        Ulasan::create([
            'iklan_id' => $id,
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
            'rating' => $request->rating,
        ]);
        return redirect()->back();
    }
}
