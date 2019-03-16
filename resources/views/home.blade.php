@extends('layouts.app')

@section('content')
{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($blog as $blog)
        
          <div class="col-md-6 mt-3">
           <div class="card">
            <div class="row">

                 @if ($blog->poto_profile() === 'default.png')
                 
              <div class="col-md-1"> <a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}"> <img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="200%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</a></p> </div>

                    @else
              <div class="col-md-1"> <a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}"> <img src="{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="200%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</a></p> </div>
                    @endif
           
           <a href="{{Route('details',$blog->slug)}}">
              
             <img src="/storage/img/{{$blog->thumbnail}}" alt="" width="100%;">
               <div class="card-body text-center">
                   <img src="" alt="">
               <h1>{{$blog->title}}</h1> 
            </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div> --}}

<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">KusukaBloging</h1>
		<p class="lead">
			Anda Bisa Post Apa Saya yang anda sukai
	</div>
<!-- End Site Title
================================================== -->

	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
	<div class="section-title">
		<h2 class="text-center"><span><a class="text-dark" style="text-decoration:none" href="/home"> Home</a></span> <span class="ml-4"><a class="text-dark" style="text-decoration:none" href="/cerita"></a> <a class="text-dark" style="text-decoration:none" href="/cerita"> Cerita </a> </span> <span class="ml-4"><a class="text-dark" style="text-decoration:none" href="/dev"> Dev </a></span> <span class="ml-4"> <a class="text-dark" style="text-decoration:none" href="/bebas">	Bebas </a></span>  <span class="ml-4"> <a class="text-dark" style="text-decoration:none" href="/indonesia"> Indonesia </a></span></h2>
	</div>
	<div class="card-columns listfeaturedtag">

        <!-- begin post -->
				@foreach ($blog as $blog)
						
		<div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="{{Route('details',[$blog->id , $blog->slug])}}">
						<div class="thumbnail" style="background-image:url('/storage/img/{{$blog->thumbnail}}');">
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title pt-3"><a href="{{Route('details',[$blog->id , $blog->slug])}}"  >{{$blog->title}}</a></h2>
						<h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}">
                                     @if ($blog->poto_profile() === 'default.png')
                                    <img class="author-thumb" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal">
                                      @else
                                    <img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
                                     @endif
                                </a>
								</span>
								<span class="author-meta">
								<span class="post-name"><a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}">{{$blog->author}}</a></span><br/>
								<span class="post-date"> {{$blog->created_at->day}}-{{$blog->created_at->month}}-{{$blog->created_at->year}}</span>
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
