<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Str;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
      $blog = Blog::all();
      $user = User::all();
      return view('admin.home',['user'=>$user,'blog'=>$blog]);
    }
    public function DeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $blog = Blog::where('author_id',$id)->get();
        for ($i=0; $i <count($blog) ; $i++) { 
            $blog[$i]->delete();
        }
        $user->delete();
        return redirect()->back();
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $blog =  Blog::find($id);
        return view('User.userEdit', ['blog'=>$blog]);
    }
    public function upload(Request $request ,$id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category = $request->category;
        $blog->isi = $request->mytextarea;
        $blog->save();
        return redirect('/admin/home');
        // return redirect(Route('myprofile',[Auth::user()->provider_id,Auth::user()->id]));
    }
}
