@extends('layouts.app')

@section('content')
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">My Favorite</h1>
		<p class="lead">	
			@if (count($favorite) == null)
		
			<h1 class="text-center " style="margin-top: 14%">Tidak Ada Favorite</h1>
		@else
	</div>
	<section class="featured-posts">
	<div class="section-title">
	</div>
	<div class="card-columns listfeaturedtag">
        @foreach ($favorite as $blog)
		<div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="{{Route('details',[$blog->blog->id , $blog->blog->slug])}}">
						<div class="thumbnail" style="background-image:url('/storage/img/{{$blog->blog->thumbnail}}');">
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title pt-3"><a href="{{Route('details',[$blog->blog->id , $blog->blog->slug])}}"  >{{$blog->blog->title}}</a></h2>
						<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="/profile/{{$blog->blog->provider_id()}}/{{$blog->blog->author_id}}">
                                     @if ($blog->blog->poto_profile() === 'default.png')
                 
                                    <img class="author-thumb" src="/storage/profile/{{$blog->blog->poto_profile()}}" alt="Sal">

                                      @else
                                    <img class="author-thumb" src="{{$blog->blog->poto_profile()}}" alt="Sal">
                   
                                     @endif
                                </a>
								</span>
								<span class="author-meta">
								<span class="post-name"><a href="/profile/{{$blog->blog->provider_id()}}/{{$blog->blog->author_id}}">{{$blog->blog->author}}</a></span><br/>
								<span class="post-date"> {{$blog->blog->created_at->day}}-{{$blog->blog->created_at->month}}-{{$blog->blog->created_at->year}}</span>
								</span>
								<span class="post-read-more pt-2"><a href="{{Route('deletefavorite',$blog->id)}}" title="Read Story">Delete For My Favorite</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        @endforeach
@endif
@endsection
