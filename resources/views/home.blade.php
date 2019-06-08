@extends('layouts.app')
@section('content')
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle"></h1>
		<p class="lead">
			{{-- Anda Bisa Post Apa Saya yang anda sukai --}}
	</div>

	<section class="featured-posts">
		<div class="section-title">
			<h2 class="text-left"><span><a class="text-dark" style="text-decoration:none" href="{{Route('home')}}">
						Home</a></span> <span class="ml-4"><a class="text-dark" style="text-decoration:none"
						href="{{Route('cerita')}}"> Cerita </a> </span> <span class="ml-4"><a class="text-dark"
						style="text-decoration:none" href="{{Route('dev')}}"> Dev </a></span> <span class="ml-4"> <a
						class="text-dark" style="text-decoration:none" href="{{Route('bebas')}}"> Bebas </a></span>
				<span class="ml-4"> <a class="text-dark" style="text-decoration:none" href="{{Route('indonesia')}}">
						Indonesia </a></span>
				<span class="float-right" style="font-size:20px; padding:7px;">

					<ul class="" style="margin-top:-8px; ">
						<!-- Authentication Links -->
						@guest
						<a class="nav-link text-dark" style="padding:9px;"
							href="{{ route('login') }}">{{ __('Login') }}</a>

						{{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a href="{{Route('myprofile',[Auth::user()->provider_id,Auth::user()->id])}}"
									class="dropdown-item">My
									Account</a>
								@if (Auth::user()->members == 'Pro')
								@else
								<a href="{{Route('buymember')}}" class="dropdown-item">Buy Member</a>

								@endif
								<a href="{{Route('Create')}}" class="dropdown-item">Create Artikel</a>
								<a href="{{Route('myfollow')}}" class="dropdown-item">My Follow</a>
								<a href="{{Route('Myfavorite')}}" class="dropdown-item">My Favorite</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
									                                                     document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>


								<form id="logout-form" action="{{ route('logout') }}" method="POST"
									style="display: none;">
									@csrf
								</form>
							</div>
						</li>

						@endguest
					</ul>
				</span>
			</h2>
		</div>
		<div class="card-columns listfeaturedtag">

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
											{{$blog->created_at->format('d M  Y')}}</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endsection