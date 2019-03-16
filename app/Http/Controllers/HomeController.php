<?php

namespace App\Http\Controllers;
use App\Blog;
use App\favorite;
use Auth;
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
        $blog = Blog::where('category','indonesia')->get();
        return view('home',['blog'=>$blog]);

    }
        public function dev()
    {
        $blog = Blog::where('category','Dev')->get();
        return view('home',['blog'=>$blog]);

    }
        public function bebas()
    {
        $blog = Blog::where('category','bebas')->get();
        return view('home',['blog'=>$blog]);

    }
        public function cerita()
    {
        $blog = Blog::where('category','cerita')->get();
        return view('home',['blog'=>$blog]);

    }
}
