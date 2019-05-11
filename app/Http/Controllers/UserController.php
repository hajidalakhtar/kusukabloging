<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use App\favorite;
use App\Blog;
use App\User;
use App\Transaksi;
use App\Follow;
use App\like;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userId()
    {
        return Auth::user()->id;
    }

    public function Profile($id,$id_user)
    {
        
        if (Auth::user() == null) {
            $like_count =like::where('id_author',$id_user)->count();
            $follow_count =follow::where('id_target',$id_user)->count();
            $blog = Blog::where('author_id',$id_user)->get();
            $userdetails = User::where('provider_id',$id)->get();
          return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'like_count'=>$like_count,'follow_count'=> $follow_count]);

            // return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'like_count'=>$like_count,'follow_count'=> $follow_count]);

        } else {
        $like_count =like::where('id_author',$id_user)->count();
        $follow_count =follow::where('id_target',$id_user)->count();

        $followCount  = Follow::where('id_user',Auth::user()->id)->where('id_target', $id_user)->count();
        $blog = Blog::where('author_id',$id_user)->get();
        $userdetails = User::where('provider_id',$id)->get();
        return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'followCount'=>$followCount,'like_count'=>$like_count,'follow_count'=> $follow_count]);
  }
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

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('User.editProfile',['user'=>$user]);
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->save();
        return redirect(Route('myprofile',[Auth::user()->provider_id,Auth::user()->id]));


    }
    public function favorite()
    {
            $favorite = favorite::where('id_user',Auth::user()->id)->get();
            // dd(Count($favorite));
            return view('User.favorite', ['favorite'=>$favorite]);        
    }
    public function Follow()
    {
        if (Auth::user() == null) {
            return redirect('/register');
        } else {
        $follow = Follow::where('id_user',Auth::user()->id)->get();
            $follow_count = Follow::where('id_user',Auth::user()->id)->count();
            $id_blog = [];
            $m = 0;
            for ($i=0; $i < $follow_count; $i++) { 
                $blog_count = Blog::where('author_id',$follow[$i]->id_target)->count();
                for ($j=0; $j < $blog_count ; $j++) { 
                   
                    $data_blog = Blog::where('author_id',$follow[$i]->id_target)->get();
                    for ($l=0; $l <= $blog_count ; $l++) { 
                        $id_blog[$m] =  $data_blog[$j]->id;
                        
                    }
                     $m++;
                }
            }
            $data_blog_final = [];
            for ($n=0; $n < count($id_blog) ; $n++) { 
                $data_blog_final[$n] = Blog::find($id_blog[$n]);
            }
            return view('User.follow', ['data' => $data_blog_final]);
        }
    }
    public function buymember()
    {
        $transaksi = Transaksi::where('user',Auth::user()->id)->first();
        if ($transaksi == null) {
            return view('buymember');
        } else {
           
            if ($transaksi->foto == null) {
                $rand = $transaksi->id_transaksi;
                  return redirect(Route('formbuy',$rand));
            } else {
                return 'tinggu';
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
        $transaksi = Transaksi::where('id_transaksi',$kode)->first();
        return view('formbelipro',['kode'=> $transaksi->id_transaksi]);

    }
    public function uploadBukti(Request $req, $kode)
    {
        $transaksi = Transaksi::where('id_transaksi',$kode)->first();
        // $image = $req->image->store('public/img');
        // $transaksi->foto = basename($image);
        $file = $req->file('file');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move(public_path("img"),$newName);
        $transaksi->foto = $newName;
        $transaksi->save();
        return basename($newName);
    }

}
