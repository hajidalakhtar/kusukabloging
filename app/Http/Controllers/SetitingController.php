<?php

namespace App\Http\Controllers;
use App\Setiting;
use Illuminate\Http\Request;

class SetitingController extends Controller
{
public function submitSetting(Request $req)
    {
        $setiting = Setiting::first();
        $setiting->app_name = $req->app_name;
        $setiting->deskripsi = $req->deskripsi;
        $setiting->copyright = $req->copyright;
        $setiting->save();
        return redirect()->back();
            
    }
}
