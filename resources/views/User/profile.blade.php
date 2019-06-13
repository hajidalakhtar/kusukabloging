@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content') @foreach ($user as $user)
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2 col-xs-12" style="border-bottom: 1px solid #D7D7D7">
            <div class="mainheading">

                <!-- Begin Top Meta -->
                <div class="row post-top-meta">
                    <div class="col-md-2 img-rp">
                        @if ($user->poto === 'default.png')
                        <img src="{{asset('/storage/img/'.$user->poto)}}" alt="" class="author-thumb" width="1000px;">
                        @else
                        <img src="{{$user->poto }}" alt="" class="author-thumb"> @endif
                    </div>
                    <div class="col-md-10" style="margin-top: 3%">
                        @if ($user->members =='Pro')
                        <img src="{{asset('image/star.svg')}}" alt="" width="5%" class="mb-1 mr-2">

                        @else

                        @endif
                        <a class="link-dark">{{$user->name}}</a>
                        @guest @if (Route::has('register')) @endif
                        @else @if (Auth::user()->provider_id === $user->provider_id)
                        <a href="{{Route('Create')}}" class="btn follow">Create Artikel</a>

                        <a href="{{Route('editprofile',$user->id)}}" class="btn follow">Edit Profile</a> @else
                        @if($followCount == 1)
                        <a href="{{Route('unfollow',$user->id)}}" class="btn follow">UnFollow</a> @else
                        <a href="{{Route('follow',$user->id)}}" class="btn follow">Follow</a> @endif @endif @endguest
                        <br>
                        <span class="author-description">{{$user->description}}</span> <br>
                        <span class="post-date">{{count($blog1)}} Artikel</span><span class="dot"></span><span
                            class="post-read">{{$like_count}} Like</span>
                        <span class="dot"></span><span class="post-read">{{$follow_count}} Followers</span>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @if (count($blog1) == 0)
        <h1 class="text-center mt-5">Belom Ada Post dari {{$user->name}}</h1>
        @else @foreach ($blog1 as $blog)
        <div class="listrecent listrelated mt-5" style="width:100%;">
            <div class="authorpostbox">
                <div class="card">
                    <a href="{{Route('details',[$blog->id , $blog->slug])}}">
                        {{-- <img class="img-fluid img-thumb" src="assets/img/demopic/8.jpg" alt=""> --}}
                        <img src="{{asset('/image/'.$blog->thumbnail)}}" alt="" class="img-fluid img-thumb">

                    </a>
                    <div class="card-block">
                        <div class="container">

                            <h2 class="card-title mt-3"><a
                                    href="{{Route('details',[$blog->id , $blog->slug])}}">{{$blog->title}}</a></h2>
                            <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to additional content.
                                This content is a little bit longer.</h4>
                            <div class="metafooter">
                                <div class="wrapfooter">
                                    <span class="meta-footer-thumb">
                                        <a href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">
                                            @if ($blog->poto_profile() === 'default.png')

                                            <img class="author-thumb  "
                                                src="{{asset('/storage/img/'.$blog->poto_profile())}}" alt="Sal">

                                            @else
                                            <img class="author-thumb  " src="{{$blog->poto_profile()}}" alt="Sal">

                                            @endif
                                        </a>
                                    </span>
                                    <span class="author-meta">
                                        <span class="post-name"><a
                                                href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">{{$blog->author}}</a></span><br />
                                        <span class="post-date">
                                            {{$blog->created_at->day}}-{{$blog->created_at->month}}-{{$blog->created_at->year}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach @endif
            @endsection