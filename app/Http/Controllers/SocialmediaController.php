<?php

namespace App\Http\Controllers;
use Auth;
use App\Follow;
use App\favorite;
use App\like;
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
        $favorite = favorite::destroy($id);
        // $favorite->delete();
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


     public function like($id_target,$id_author)
    {
        $like = new like;
        $like->id_user = Auth::user()->id;
        $like->id_author = $id_author;
        $like->id_blog = $id_target;
        $like->save();
        return redirect()->back();

    }
    
    public function delete_like($id)
    {
        $like = like::find($id);
        $like->delete();
        return redirect()->back();
        
    }

    public function cekLike($idUser,$idBlog)
    {
        $like = like::where('id_user',$idUser)->where('id_blog',$idBlog)->get();
        if (count($like) >= 1) {
            $like_first = $like[0];
            return $like_first;
        }else{
            return 'data tidak';

        }

    }
    public function cekBookmark($idUser,$idBlog)
    {
        $bookmark = favorite::where('id_user',$idUser)->where('blog_id',$idBlog)->get();
        // dd($bookmark);
        if (count($bookmark) >= 1) {
            $bookmark_first = $bookmark[0];
            return $bookmark_first;
        }else{
            return 'data tidak';

        }

    }


}
