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
/*
|--------------------------------------------------------------------------
| Blog Api
|--------------------------------------------------------------------------
| Semua tentang blog
|
*/
   public function details($id)
    {
        $like_count =like::where('id_blog',$id)->count();
        $blog = Blog::where('id',$id)->first();
        // dd($blog->isi);
        $blog_isi = strip_tags($blog->isi);
        // dd($blog_isi);
        $blog->isi = $blog_isi;
        $id = comment::where('artikel_slug',$id)->orderBy('id', 'DESC')->get();
        return  ['status'=>200,'blog'=>$blog,'comment'=>$id,'like_count'=>$like_count ];
        
    }
    public function allBlog()
    {
        $blog = Blog::all();
        // $blog_id =$blog->id;
        $blog_data = [];

        for ($i=0; $i < count($blog); $i++) { 
            $blog_isi = strip_tags($blog[$i]->isi);
            // $blog_data[$i] = ["id" => $blog[$i]->id,"author"=>$blog[$i]->author,"author_id"=>$blog[$i]->author_id,"title"=>$blog[$i]->title,"category"=>$blog[$i]->category,"thumbnail"=>$blog[$i]->thumbnail,'isi'=>$blog_isi,'slug'=>$blog[$i]->slug];
            // $blog[$i]->isi = $blog_data;
            $blog[$i]->isi = $blog_isi;
        }
        // dd($blog_2);

        return ['status'=>200,'data'=>$blog];


    }
   






      public function indonesia()
    {
        $blog = Blog::where('category','Indonesia')->get();
        return $blog;

    }
        public function dev()
    {
        $blog = Blog::where('category','Dev')->get();
        return $blog;

    }
        public function bebas()
    {
        $blog = Blog::where('category','Bebas')->get();
        return $blog;

    }
        public function cerita()
    {
        $blog = Blog::where('category','Cerita')->get();
        return $blog;

    }
     public function userId()
    {
        return Auth::user()->id;
    }
         public function Profile($id,$id_user)
    {
            $like_count =like::where('id_author',$id_user)->count();
            $follow_count =follow::where('id_target',$id_user)->count();
            $followCount  = 2;
            $blog = Blog::where('author_id',$id_user)->get();
            $userdetails = User::where('provider_id',$id)->get();
            return ['status'=>200,'user'=>$userdetails,'followCount'=>$followCount,'like_count'=>$like_count,'follow_count'=> $follow_count,'blog'=> $blog,];
     
    }

}
