<?php

namespace App\Http\Controllers;
use App\Blog;
use Auth;
use App\User;
use App\like;
use App\Follow;
use App\favorite;
use App\comment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function details($id,$slug)
    {
        $like_count =like::where('id_blog',$id)->count();
        $blog = Blog::where('id',$id)->get();
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->get();
        return  ['blog'=>$blog,'comment'=>$id,'like_count'=>$like_count ];
        
    }
        public function Profile($id,$id_user)
    {
            $like_count =like::where('id_author',$id_user)->count();
            $follow_count =follow::where('id_target',$id_user)->count();
            $followCount  = 2;
            $blog = Blog::where('author_id',$id_user)->get();
            $userdetails = User::where('provider_id',$id)->get();
          return ['blog'=> $blog,'user'=>$userdetails,'followCount'=>$followCount,'like_count'=>$like_count,'follow_count'=> $follow_count];

            // return view('User.profile',['blog1'=> $blog,'user'=>$userdetails,'like_count'=>$like_count,'follow_count'=> $follow_count]);

     
    }
}
