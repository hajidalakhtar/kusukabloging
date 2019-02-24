<?php

namespace App\Http\Controllers;
use Auth;
use App\Follow;
use App\favorite;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function favorite($id_artikel)
    {
        // dd("tes");
        $favorite = new favorite;
        $favorite->id_user = Auth::user()->id;
        $favorite->blog_id = $id_artikel;
        $favorite->save();
        return redirect()->back();
    }

        public function delete_favorite($id)
    {
        $favorite = favorite::where('blog_id',$id);
        $favorite->delete();
        return redirect()->back();
    }
    public function follow($id_target)
    {
        $follow = new Follow;
        $follow->id_user = Auth::user()->id;
        $follow->id_target = $id_target;
        $follow->save();
        return redirect()->back();

    }
    public function delete_follow($id)
    {
        $follow = Follow::where('id_target',$id);
        $follow->delete();
        return redirect()->back();
        
    }
}
