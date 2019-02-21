<?php

namespace App\Http\Controllers;
use App\Blog;
use Auth;
use App\comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function details($slug)
    {
        $blog = Blog::where('slug',$slug)->get();
        $id = comment::where('artikel_slug',$slug)->orderBy('id', 'DESC')->get();
        // $comment = Comment::where('artikel_id',)->get();
        // dd($id);
     
        return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id]);

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
        return redirect('detail/'.$request->title);


    }

}
