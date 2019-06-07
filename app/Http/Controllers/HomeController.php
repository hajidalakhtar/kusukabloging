<?php

namespace App\Http\Controllers;
use App\Blog;
use App\favorite;
use Auth;
use App\User;
use App\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog = Blog::all();
        return view('home',['blog'=>$blog]);
    }
    public function indonesia()
    {
        $blog = Blog::where('category','Indonesia')->get();
        return view('home',['blog'=>$blog]);

    }
        public function dev()
    {
        $blog = Blog::where('category','Dev')->get();
        return view('home',['blog'=>$blog]);

    }
        public function bebas()
    {
        $blog = Blog::where('category','Bebas')->get();
        return view('home',['blog'=>$blog]);

    }
        public function cerita()
    {
        $blog = Blog::where('category','Cerita')->get();
        return view('home',['blog'=>$blog]);

    }

    // Admin
      public function adminHome()
    {
      $blog = Blog::all();
      $user = User::all();
      $transaksi = Transaksi::whereNotNull('foto')->get();
      return view('admin.home',['user'=>$user,'blog'=>$blog,'transaksi'=>$transaksi]);
    }
    
}
