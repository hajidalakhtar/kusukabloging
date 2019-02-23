<?php

namespace App\Http\Controllers;
use Auth;
use App\Blog;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function Profile($id,$id_user)
    {
        // $user = Auth::user()->name;
        $blog = Blog::where('author_id',$id_user)->get();
        $userdetails = User::where('provider_id',$id)->get();
        // dd($userdetails);
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
        return redirect('/profile/'.Auth::user()->provider_id.'/'.Auth::user()->id);
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
        return redirect('/profile/'.Auth::user()->provider_id.'/'.Auth::user()->id);

    }


}
