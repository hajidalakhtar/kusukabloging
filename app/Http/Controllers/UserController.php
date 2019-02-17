<?php

namespace App\Http\Controllers;
use Auth;
use App\Blog;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function Profile($user)
    {
        // $user = Auth::user()->name;
        $blog = Blog::where('author',$user)->get();
        $userdetails = User::where('name',$user)->get();
        return view('User.profile',['blog'=> $blog,'user'=>$userdetails]);
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
        $image = $request->img->store('public/img');
        $blog->thumbnail = basename($image);
        $blog->save();
        return redirect(Route('myprofile',Auth::user()->name));
    }


}
