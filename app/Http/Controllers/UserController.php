<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use App\favorite;
use App\Blog;
use App\User;
use App\Transaksi;
use App\Setiting;
use App\Follow;
use App\like;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
   

    public function Profile($id,$id_user)
    {
        
        if (Auth::user() == null) {
        $setiting = Setiting::first();

            $like_count =like::where('id_author',$id_user)->count();
            $follow_count =follow::where('id_target',$id_user)->count();
            $blog = Blog::where('author_id',$id_user)->orderBy('id', 'DESC')->get();
            $userdetails = User::where('provider_id',$id)->get();
          return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'like_count'=>$like_count,'follow_count'=> $follow_count,'setting'=>$setiting]);
            // return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'like_count'=>$like_count,'follow_count'=> $follow_count]);
        } else {
        $setiting = Setiting::first();

        $like_count =like::where('id_author',$id_user)->count();
        $follow_count =follow::where('id_target',$id_user)->count();

        $followCount  = Follow::where('id_user',Auth::user()->id)->where('id_target', $id_user)->count();
        $blog = Blog::where('author_id',$id_user)->orderBy('id', 'DESC')->get();
        $userdetails = User::where('provider_id',$id)->get();
        return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'followCount'=>$followCount,'like_count'=>$like_count,'follow_count'=> $follow_count,'setting'=>$setiting]);
  }
    }
  
   

    public function editProfile($id)
    {
        $setiting = Setiting::first();

        $user = User::find($id);
        return view('User.editProfile',['user'=>$user,'setting'=>$setiting]);
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
        $setiting = Setiting::first();

            $favorite = favorite::where('id_user',Auth::user()->id)->get();
            return view('User.favorite', ['favorite'=>$favorite,'setting'=>$setiting]);        
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
        $setiting = Setiting::first();

            return view('User.follow', ['data' => $data_blog_final,'setting'=>$setiting]);
        }
    }

}
