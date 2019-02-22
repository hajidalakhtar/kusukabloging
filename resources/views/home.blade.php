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
		<h2><span>Featured</span></h2>
	</div>
	<div class="card-columns listfeaturedtag">

        <!-- begin post -->
        @foreach ($blog as $blog)
		<div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="{{Route('details',$blog->slug)}}">
						<div class="thumbnail" style="background-image:url('/storage/img/{{$blog->thumbnail}}');">
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title pt-3"><a href="{{Route('details',$blog->slug)}}"  >{{$blog->title}}</a></h2>
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
								{{-- <span class="post-read-more"><a href="{{Route('details',$blog->slug)}}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        @endforeach
		<!-- end post -->




@endsection
