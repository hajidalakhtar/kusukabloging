<?php

namespace App\Http\Controllers;
use App\Transaksi;
use Auth;
use App\Setting;
// 'setting'=>$setiting
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
        public function buymember()
    {
        // 'setting'=>$setiting
        $setiting = Setiting::first();

        $transaksi = Transaksi::where('user',Auth::user()->id)->first();
        if ($transaksi == null) {
            return view('buymember');
        } else {
           
            if ($transaksi->foto == null) {
                $rand = $transaksi->id_transaksi;
                  return redirect(Route('formbuy',$rand));
            } else {
                return view('tungguProsesAcc');
            }
            

     }
    }
    public function prosesBeli()
    {
        $transaksi = new Transaksi;
        $rand = str_random(10);
        $transaksi->id_transaksi = $rand;
        $transaksi->user = Auth::user()->id;
        $transaksi->status = "Belum disetujui";
        $transaksi->save();
        return redirect(Route('formbuy',$rand));


    }
    public function formBuy($kode)
    {
        $setiting = Setiting::first();

        $transaksi = Transaksi::where('id_transaksi',$kode)->first();
        return view('formbelipro',['kode'=> $transaksi->id_transaksi]);

    }
    public function uploadBukti(Request $req, $kode)
    {
        $setiting = Setiting::first();

        $transaksi = Transaksi::where('id_transaksi',$kode)->first();
        $file = $req->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move(public_path("img"),$newName);
        $transaksi->foto = $newName;
        $transaksi->save();
        return view('tungguProsesAcc');
    }

}
