<?php

namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function details($slug)
    {
        $blog = Blog::where('slug',$slug)->get();
        return view('detailsArtikel', ['blog'=>$blog]);

    }

}
