<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Setiting;
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
        $setiting = Setiting::first();

        return view('home',['blog'=>$blog,'setting'=>$setiting]);
    }
    public function indonesia()
    {
        $setiting = Setiting::first();

        $blog = Blog::where('category','Indonesia')->get();
        return view('home',['blog'=>$blog,'setting'=>$setiting]);

    }
        public function dev()
    {
        $setiting = Setiting::first();

        $blog = Blog::where('category','Dev')->get();
        return view('home',['blog'=>$blog,'setting'=>$setiting]);

    }
        public function bebas()
    {
        $setiting = Setiting::first();

        $blog = Blog::where('category','Bebas')->get();
        return view('home',['blog'=>$blog,'setting'=>$setiting]);

    }
        public function cerita()
    {
        $setiting = Setiting::first();

        $blog = Blog::where('category','Cerita')->get();
        return view('home',['blog'=>$blog,'setting'=>$setiting]);

    }

    // Admin
      public function adminHome()
    {
        $setiting = Setiting::first();

      $blog = Blog::all();
      $user = User::all();
      $transaksi = Transaksi::whereNotNull('foto')->get();
      return view('admin.home',['user'=>$user,'blog'=>$blog,'transaksi'=>$transaksi,'setting'=>$setiting]);
    }
    public function settingApp()
    {
        $setiting = Setiting::first();
        return view('admin.setting', ['setting'=>$setiting]);
    }
    
    
}
