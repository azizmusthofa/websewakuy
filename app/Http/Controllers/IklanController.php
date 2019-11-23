<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Iklan;
use App\Gambar;
use App\Ulasan;
use App\PelaporanIklan;

class IklanController extends Controller
{
    public function detailIklan($id)
    {
        $iklan = Iklan::find($id);
        $ulasan = Ulasan::where('iklan_id', $iklan->id)->paginate(3);
        $rata2Rating = $this->akumulasiRating($iklan->id);
        
        return view('user.registered.detail_iklan', compact('iklan', 'ulasan', 'rata2Rating'));
    }

    public static function dataIklan($id)
    {
        $iklan = Iklan::find($id);
        return $iklan;
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

    public function editIklan($id)
    {
        $iklan = Iklan::find($id);
        return view('user.registered.edit_iklan', compact('iklan'));
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

    public function hapusIklan($id)
    {
        $iklan = Iklan::find($id);
        $iklan->delete();
        return redirect()->back();
    }

    public function laporkanIklan($id)
    {
        $iklan = Iklan::find($id);
        return view('user.registered.laporkan_iklan', compact('iklan'));
    }
    
    public function prosesLaporkanIklan(Request $request)
    {
        $id = Auth::id();
        $alasan="";
        foreach($request->alasan as $al){
            $alasan = $alasan.$al.',';
        } 
        $lapor = PelaporanIklan::create([
            'iklan_id' => $request->iklan_id,
            'pelapor_id' => $id,
            'alasan' => $alasan,
            'keterangan' => $request->keterangan,
        ]);
        $iklan = Iklan::find($request->iklan_id);
        return view('user.registered.invoice_pelaporan_iklan', compact('lapor', 'iklan'));
    }

    public function hapusGambar($id)
    {
        $gambar = Gambar::find($id);
        $gambar->delete();
        return redirect()->back();
    }

    public static function satuGambar($id)
    {
        $gambar = Gambar::where('iklan_id', $id)->first();
        if($gambar != null){
            return $gambar['file'];
        }
        else{
            return '1.jpg';
        }
        
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
