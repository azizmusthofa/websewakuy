<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Iklan;
use App\Notifikasi;

class TransaksiController extends Controller
{
    public function transaksiSaya()
    {
        $myId = Auth::id();
        $tran = Transaksi::where('user_id', $myId)->get();
        return view('user.registered.daftar_sewa', compact('tran'));
    }

    public function sewaBarang(Request $request)
    {
        $myId = Auth::id();
        $iklan_id = $request->iklan_id;
        $harga = $request->harga;
        $tran = $request->tran;
        $bayar = $request->bayar;
        $tgl = $request->tgl_sewa;
        $lama = $request->lama;
        
        $iklan = Iklan::find($iklan_id);
        $total = $lama*$iklan->harga_sewa;
        $transaksi = Transaksi::create([
            'user_id' => $myId,
            'iklan_id' => $iklan_id,
            'pengambilan_barang' => $tran,
            'pembayaran' => $bayar,
            'tanggal_sewa' => $tgl,
            'lama' => $lama,
            'total' => $total,
            'acc' => 'Menunggu disetujui'
        ]);
        return view('user.registered.checkout', compact('transaksi', 'iklan'));
    }

    public function kirimNotif(Request $request){
        $isi = $request->penyewa.' ingin menyewa '.$request->barang.' milik anda. Klik notifikasi ini untuk memberikan persetujuan.';

        $notif = Notifikasi::create([
            'user_id' => $request->user_id,
            'transaksi_id' => $request->tran_id,
            'isi' => $isi,
        ]);
        $myId = Auth::id();
        $tran = Transaksi::where('user_id', $myId)->get();
        return view('user.registered.daftar_sewa', compact('tran'));
    }

    public function persetujuan($id)
    {
        $transaksi = Transaksi::find($id);
        $iklan = Iklan::find($transaksi->iklan_id);
        
        return view('user.registered.persetujuan', compact('transaksi', 'iklan'));
    }

    public function prosesSetuju(Request $request)
    {
        $iklan = Iklan::find($request->iklan_id);
        $iklan->status = $request->status;
        $iklan->save();

        $id = Auth::id();
        $iklan = Iklan::where('user_id', $id)->get();
        return view('user.registered.iklan_saya', compact('iklan'));
    }

    public static function cekTersewa($user_id, $iklan_id)
    {
        $hasil = Transaksi::where('user_id', $user_id)->where('iklan_id', $iklan_id)->get();
        if($hasil->count()==0){
            return false;
        }
        else{
            return true;
        }
    }

}
