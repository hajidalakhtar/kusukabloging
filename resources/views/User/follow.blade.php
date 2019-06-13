@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')



<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">My Follow</h1>
		<p class="lead">
	</div>
	<section class="featured-posts">
		@if ($data == null)
		<h1 class="text-center mt-5">Anda Belom MemFolow Siapapun</h1>
		@else

		<div class="section-title">
		</div>
		<div class="card-columns listfeaturedtag">


			@foreach ($data as $blog)
			<div class="card">
				<div class="row">
					<div class="col-md-5 wrapthumbnail">
						<a href="{{Route('details',[$blog->id , $blog->slug])}}">
							<div class="thumbnail" style="background-image:url('{{asset('/image/'.$blog->thumbnail)}};">
							</div>
						</a>
					</div>
					<div class="col-md-7">
						<div class="card-block">
							<h2 class="card-title pt-3"><a href="{{Route('details',[$blog->id , $blog->slug])}}">{{$blog->title}}</a>
							</h2>
							<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
								content. This content is a little
								bit longer.</h4>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">
											@if ($blog->poto_profile() === 'default.png')

											<img class="author-thumb" src="{{asset('/storage/img/'.$blog->poto_profile())}}" alt="Sal">

											@else
											<img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">

											@endif
										</a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a
												href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">{{$blog->author}}</a></span><br />
										<span class="post-date">
											{{$blog->created_at->day}}-{{$blog->created_at->month}}-{{$blog->created_at->year}}</span>
									</span>
									<span class="post-read-more pt-2"><a href="{{Route('deletefavorite',$blog->id)}}"
											title="Read Story">Delete For My Favorite</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach @endif
			@endsection