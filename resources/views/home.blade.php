@extends('layouts.app')
@section('content')
<!-- Titile
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">KusukaBloging</h1>
		<p class="lead">
			Anda Bisa Post Apa Saya yang anda sukai
	</div>
	<!-- ================================================== -->


	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
		<div class="section-title">
			<h2 class="text-center"><span><a class="text-dark" style="text-decoration:none" href="{{Route('home')}}">
						Home</a></span> <span class="ml-4"><a class="text-dark" style="text-decoration:none"
						href="{{Route('cerita')}}"> Cerita </a> </span> <span class="ml-4"><a class="text-dark"
						style="text-decoration:none" href="{{Route('dev')}}"> Dev </a></span> <span class="ml-4"> <a
						class="text-dark" style="text-decoration:none" href="{{Route('bebas')}}"> Bebas </a></span>
				<span class="ml-4"> <a class="text-dark" style="text-decoration:none" href="{{Route('indonesia')}}">
						Indonesia </a></span></h2>
		</div>
		<div class="card-columns listfeaturedtag">

			<!-- begin post -->
			@foreach ($blog as $blog)

			<div class="card">
				<div class="row">
					<div class="col-md-5 wrapthumbnail">
						<a href="{{Route('details',[$blog->id , $blog->slug])}}">
							<div class="thumbnail"
								style="background-image:url('{{asset('/image/'.$blog->thumbnail)}}');">
							</div>
						</a>

					</div>
					<div class="col-md-7">
						<div class="card-block">
							<h2 class="card-title pt-3"
								style="overflow: hidden; text-overflow: ellipsis; max-height: 3ch; text-decoration:none; white-space: nowrap;  width: 90%; ">
								<a href="{{Route('details',[$blog->id , $blog->slug])}}">{{$blog->title}}</a></h2>
							<h4 class="card-text"
								style="overflow: hidden; text-overflow: ellipsis; max-height: 11.9ch; text-decoration:none ; ">
								<p>
									<?php
							$nbsp = html_entity_decode("&nbsp;");
							$s = html_entity_decode($blog->isi);
							$s = str_replace($nbsp, " ", $s);
							echo strip_tags($s);
							?>

								</p>
							</h4>
							<div class="metafooter">

								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">
											@if ($blog->poto_profile() === 'default.png')
											<img class="author-thumb"
												src="{{asset('/storage/img/'.$blog->poto_profile())}}" alt="Sal">
											@else
											<img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
											@endif
										</a>
										<span class="post-read-more pt-2"><a
												href="{{Route('deletefavorite',$blog->id)}}"
												title="Read Story">{{$blog->category}}</a></span>

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
			@endforeach
			<!-- end post -->
			@endsection