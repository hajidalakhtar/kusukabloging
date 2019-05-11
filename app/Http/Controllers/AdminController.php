<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Str;
use Illuminate\Support\Str;
use Auth;
use App\Transaksi;
use App\User;
use App\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
      $blog = Blog::all();
      $user = User::all();
      $transaksi = Transaksi::whereNotNull('foto')->get();
      return view('admin.home',['user'=>$user,'blog'=>$blog,'transaksi'=>$transaksi]);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $blog = Blog::where('author_id',$id)->get();
        for ($i=0; $i < count($blog) ; $i++) { 
            $blog[$i]->delete();
        }
        $user->delete();
        return redirect()->back();
    }

    public function adminDeleteBlog($id)
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
    }
    public function terimaPro($kode)
    {
        $transaksi = Transaksi::where('id_transaksi',$kode)->first();
        $user = User::where('id',$transaksi->user)->first();
        $user->members = 'Pro';
        $user->save();
        $transaksi->delete();
        return redirect()->back();
    }
}
