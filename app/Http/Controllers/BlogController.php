<?php

namespace App\Http\Controllers;
use App\Blog;
use Auth;
use App\User;
use App\like;
use Illuminate\Support\Str;
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
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->paginate(4);
        $member = User::where('id',$blog[0]->author_id)->first();
        $themes = $blog[0]->themes;
        
        if ($themes == 1) {
            return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members]);
        }else {
            return view('detailsArtikel_1', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members]);
            
        }
    } else {
        $like_count =like::where('id_blog',$id)->count();
        $favoriteCount  = favorite::where('blog_id',$id)->where('id_user', Auth::user()->id)->count();
        $likeCount  = like::where('id_blog',$id)->where('id_user', Auth::user()->id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->paginate(4);
        $member = User::where('id',$blog[0]->author_id)->first();
        $themes = $blog[0]->themes;
        
        if ($themes == 1) {
            return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members]);
        }else {
            return view('detailsArtikel_1', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members]);
            
        }
        }

        
    }
    public function delete($id)
    {
        $blog = Blog::destroy($id);
        return redirect(Route('myprofile',[Auth::user()->provider_id,Auth::user()->id]));

    
    }
    public function create_comment(Request $request)
    {
        $comment = new Comment;
        if (Auth::user() == null) {
            return redirect(Route('login'));
            
        } else {
            $comment->author = Auth::user()->name;
            $comment->author_id = Auth::user()->id;
            $comment->member = Auth::user()->members;
        }
        
        $comment->isi_comment = $request->isi;
        $comment->artikel_slug = $request->title;
        $comment->save();
        
        return redirect()->back();

    }

   public function Create()
    {
     return view('User.userCreate');   

    }
     public function Store(Request $request)
    {
        $blog = new Blog;
        $blog->author = Auth::user()->name;
        $blog->author_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category = $request->category;
        // $blog->isi = $request->mytextarea;
        $blog->isi = $request->mytextarea;
        $blog->themes = $request->themes;
        $file = $request->file('img');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('image',$newName);
        $blog->thumbnail = $newName;
        $blog->save();
        return redirect(Route('myprofile',[Auth::user()->provider_id,Auth::user()->id]));
    }

}
