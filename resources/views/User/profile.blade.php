@extends('layouts.app')

@section('content')
{{-- @foreach ($user as $user)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    @if ($user->poto === 'default.png')
                    <img src="/storage/profile/{{$user->poto }}" alt="" class="rounded-circle" width="130px;">
                    @else
                    <img src="{{$user->poto }}" alt="" class="rounded-circle" width="130px">
                    @endif
                <h1 class="text-center mt-3">{{ $user->name }}</h1>
                    <span>10 Folower </span> | <span> 30 Post</span>  @guest
      @if (Route::has('register'))
           @endif
       @else
      @if (Auth::user()->name === $user->name)
                <a href="{{Route('editprofile')}}">Edit Profile</a>
    @endif
   @endguest
  
            </div>
            </div>
        </div>
@endforeach

        @foreach ($blog as $blog)
          <div class="col-md-5 mt-3">
           <div class="card">
           <a href="{{Route('details',$blog->slug)}}">
            <div class="row">
                   @if ($user->poto === 'default.png')
                    <div class="col-md-1"><img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</p>

                    @else
                    <div class="col-md-1"><img src="{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</p>

                    @endif
               </div>
              
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
@foreach ($user as $user)
  
<div class="container mt-2" >
	<div class="row justify-content-center">
<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">

				<!-- Begin Top Meta -->
				<div class="row post-top-meta">
					<div class="col-md-2">
                           @if ($user->poto === 'default.png')
                    <img src="/storage/profile/{{$user->poto }}" alt="" class="author-thumb" width="1000px;">
                    @else
                    <img src="{{$user->poto }}" alt="" class="author-thumb"  >
                    @endif
					</div>
					<div class="col-md-10">
                    <a class="link-dark" href="author.html">{{$user->name}}</a>      
                       @guest
                         
                            @if (Route::has('register'))
                              
                            @endif
                        @else
                            @if (Auth::user()->name === $user->name)
                    <a href="{{Route('Create')}}" class="btn follow">Create Artikel</a>

                <a href="{{Route('editprofile',$user->id)}}" class="btn follow">Edit Profile</a>
                @else
                    <a href="{{Route('Create')}}" class="btn follow">Follow</a>

                 @endif
                        @endguest
						<span class="author-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae repellendus odio, accusantium placeat voluptatibus voluptate tempora alias incidunt, officia esse illo veniam repellat dolor, quas quam facilis doloribus obcaecati. Quo!</span>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
					</div>
                </div>
           </div>
</div>


				<!-- End Top Menta -->
@endforeach

<!-- End Top Author Meta
================================================== -->

<!-- Begin Author Posts
================================================== -->
        @foreach ($blog as $blog)

		<div class="listrecent listrelated ">
				<div class="authorpostbox">
					<div class="card">
						<a href="{{Route('details',$blog->slug)}}">
                        {{-- <img class="img-fluid img-thumb" src="assets/img/demopic/8.jpg" alt=""> --}}
                        <img src="/storage/img/{{$blog->thumbnail}}" alt=""  class="img-fluid img-thumb">
                        
						</a>
						<div class="card-block">
                            <div class="container">

                        <h2 class="card-title mt-3"><a href="{{Route('details',$blog->slug)}}">{{$blog->title}}</a></h2>
              <h4 class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</h4>
            	<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
									<a href="author.html">
                                             @if ($blog->poto_profile() === 'default.png')
                 
                                    <img class="author-thumb" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal">

                                      @else
                                    <img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
                   
                                     @endif
                                    </a>
									</span>
									<span class="author-meta">
                                    <span class="post-name"><a href="author.html">{{$blog->author}}</a></span><br/>
									<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
								</div>
							</div>
                        </div>
                            </div>
                        
					</div>
                </div>
                
				<!-- end post -->
@endforeach

@endsection
