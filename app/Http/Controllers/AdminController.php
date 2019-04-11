<?php

namespace App\Http\Controllers;

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

}
