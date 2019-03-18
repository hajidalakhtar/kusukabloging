<?php

namespace App\Http\Controllers;
use App\Blog;
use Auth;
use App\like;
use App\favorite;
use App\comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function details($id,$slug)
    {

        if (Auth::user() == null) {
        $like_count =like::where('id_blog',$id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$slug)->orderBy('id', 'DESC')->get();
        return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count]);
        } else {
        $like_count =like::where('id_blog',$id)->count();
        $favoriteCount  = favorite::where('blog_id',$id)->where('id_user', Auth::user()->id)->count();
        $likeCount  = like::where('id_blog',$id)->where('id_user', Auth::user()->id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$slug)->orderBy('id', 'DESC')->get();
        return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'favoriteCount'=>$favoriteCount,'likeCount'=>$likeCount,'like_count'=>$like_count ]);
        }

        
    }
    public function delete($id)
    {
        $blog = Blog::destroy($id);

        return redirect('/profile/'.Auth::user()->provider_id.'/'.Auth::user()->id);
    
    }
    public function create_comment(Request $request)
    {
        $comment = new Comment;
        $comment->author = Auth::user()->name;
        $comment->author_id = Auth::user()->id;
        $comment->isi_comment = $request->isi;
        $comment->artikel_slug = $request->title;
        $comment->save();
        // return redirect('detail/'.$request->title);
        return redirect()->back();

    }



}
