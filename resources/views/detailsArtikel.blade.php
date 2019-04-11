@extends('layouts.app')

@section('content')


<!-- Begin Article
================================================== -->

    @foreach ($blog as $blog)

<div class="container">
	<div class="row">
		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
			<div class="share mt-5">
		
				<ul>
                        <li>
                        
                  
                                @guest
                                 
                                @if (Route::has('register'))
                                  
                                @endif
                            @else
                              @if (Auth::user()->name === $blog->author)
                                 <a href="{{Route('delete',$blog->id)}}" ><i class="fa-2x fas fa-trash text-dark"></i></a>
                                 @endif
                            @endguest
                         </li>
                         @guest
                           {{-- <details-post idartikel="{{json_encode($blog->id)}}" iduser=""/> --}}
                     @else
                           <details-post idartikel="{{json_encode($blog->id)}}" iduser="{{json_encode(Auth::user()->id)}}"/>
                        
                         
                     @endguest
                   
                           {{-- <details-post idartikel="{{json_encode($blog->id)}}" iduser="{{json_encode(Auth::user()->id)}}"/> --}}
                         
                
                        </ul>


                         <ul >
                                <li >
                                        <i class=" text-dark fa-2x fab fa-twitter"></i>
                                    </li>
                                    <li>
                
                                            <i class="text-dark fa-2x  fab fa-facebook"></i>
                                    </li>
                            
                            </ul>
			</div>
		</div>
		<!-- End Fixed Left Share -->

		<!-- Begin Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">
			
            <h1 class="posttitle text-center" style="font-size:42px;border-bottom:1px solid black; padding-bottom:20px;">{{$blog->title}} 
                
            </h1>
			</div>
        <img class="featured-image img-fluid" src="{{asset('/storage/img/'.$blog->thumbnail)}}" alt="">
			<!-- End Featured Image -->
			<!-- Begin Post Content -->
			<div class="article-post">
			{!!$blog->isi!!}
			</div>
			<!-- End Post Content -->

			<!-- Begin Tags -->
			<div class="after-post-tags">
				<ul class="tags">
                <li><a href="#">{{$blog->category}}</a></li>
         
                        <span class="float-right"> {{$like_count}} <i class="far  fa-heart"></i></span> 
                </ul>
         
            </div>
            	<div class="row post-top-meta">
					<div class="col-md-2">
						<a href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">    
                             @if ($blog->poto_profile() === 'default.png')
                        <img class="author-thumb" src="{{asset('/storage/img/'.$blog->poto_profile())}}" alt="Sal">
                    @else
                        <img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
                    @endif
                        </a>
					</div>
					<div class="col-md-10 mt-3">
                    <a class="link-dark" href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">{{$blog->author}}</a>
                    
                    <br>
                    <span class="author-description">{{$blog->description()}}</span>
                    <br>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
                    </div>
       
                    
				</div>

		</div>

	</div>
</div>
@endforeach 
<div class="container" style="width: 60%">
<h4>Commnet</h4>

<form action="{{Route('create_comment')}}" method="post">
    @csrf
        <div class="row">
            <div class="col-md-10">
          <input type="text" class="form-control" name="isi">
                <input type="text" class="form-control" name="title" value="{{$blog->id}}" hidden >
            </div>
            <div class="col-md-2">
                <input type="submit" name="" id="" class="btn btn-primary">
            </div>
        </div>
    </form>
    <br>
    @if (count($comment) >= 1)
    @foreach ($comment as $data)
        
   
            <div class="row mt-5">
                <div class="col-md-2">
                    	<a href="author.html">    
                             @if ($data->poto_profile() === 'default.png')
                        <img class="rounded" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal" >

                    @else

                        <img class="rounded" src="{{$data->poto_profile()}}" alt="Sal" width="100px;">
                    @endif
                        </a>
                </div>
                 <div class="col-md-10">
                   
                     <span>dikomentari oleh  <b>{{$data->author}}</b></span>
                        <h3 class="pt-1" style="  word-wrap: break-word;">{{$data->isi_comment}}</h3>
                </div>
            </div>
@endforeach 
 @else
 <h1 class="text-center mt-5">Tidak Ada Comment</h1>
        
    @endif 
</div>
<!-- End Article
================================================== -->



<!-- Begin AlertBar
================================================== -->
{{-- <div class="alertbar">
	<div class="container text-center">
		<img src="assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
	</div>
</div> --}}





@endsection
