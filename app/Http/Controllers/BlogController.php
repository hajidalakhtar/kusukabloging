<?php

namespace App\Http\Controllers;
use App\Blog;
use Auth;
use App\User;
use App\like;
use Illuminate\Support\Str;
use App\favorite;
use App\comment;
use App\Setiting;
use App\draft;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function draft(Request $req)
    {
        
        $user = draft::where('user_id',Auth::user()->id)->count();

        if ($user >= 1 ) {
        $draft = draft::where('user_id',Auth::user()->id)->first();
        $draft->title = $req->title;
        $draft->isi = $req->isi;
        $draft->user_id = Auth::user()->id;
        $draft->save();
        return "update";
        }
        $draft = new draft;
        $draft->title = $req->title;
        $draft->isi = $req->isi;
        $draft->user_id = Auth::user()->id;
        $draft->save();
        return "bisa";

        
    }
    public function cekDraft()
    {
        $draft = draft::where('user_id',Auth::user()->id)->first();
        return $draft;
    }
    public function details($id,$slug)
    {
        $setiting = Setiting::first();

        if (Auth::user() == null) {
        $like_count =like::where('id_blog',$id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->paginate(4);
        $member = User::where('id',$blog[0]->author_id)->first();
        $themes = $blog[0]->themes;
        
        if ($themes == 1) {
            return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members,'setting'=>$setiting]);
        }else {
            return view('detailsArtikel_1', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members,'setting'=>$setiting]);
            
        }
    } else {
        $setiting = Setiting::first();

        $like_count =like::where('id_blog',$id)->count();
        $favoriteCount  = favorite::where('blog_id',$id)->where('id_user', Auth::user()->id)->count();
        $likeCount  = like::where('id_blog',$id)->where('id_user', Auth::user()->id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->paginate(4);
        $member = User::where('id',$blog[0]->author_id)->first();
        $themes = $blog[0]->themes;
        
        if ($themes == 1) {
            return view('detailsArtikel', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members,'setting'=>$setiting]);
        }else {
            return view('detailsArtikel_1', ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count,'member'=>$member->members,'setting'=>$setiting]);
            
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

   public function Create(Request $req)
    {
            $draft = new draft;
            $draft->title = $req->title;
            $draft->isi = $req->isi;
            $draft->user_id = Auth::user()->id;
            $draft->save();
        $setiting = Setiting::first();
        return view('User.userCreate',['setting'=> $setiting,'title'=>$req->title,'isi'=>$req->isi]);   

    }
     public function Store(Request $request)
    {
        $draft = draft::where('user_id',Auth::user()->id)->first();
        $blog = new Blog;
        $blog->author = Auth::user()->name;
        $blog->author_id = Auth::user()->id;
        $blog->title = $draft->title;
        $blog->slug = Str::slug($draft->title);
        $blog->category = $request->category;
        $blog->isi =  $draft->isi;
        $blog->themes = $request->themes;
        $file = $request->file('img');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('image',$newName);
        $blog->thumbnail = $newName;
        $blog->save();
        $draft->delete();
        return redirect(Route('myprofile',[Auth::user()->provider_id,Auth::user()->id]));
    }

}
