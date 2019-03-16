@extends('layouts.app')

@section('content')
{{-- <div class="container" style="width:60%">

    @foreach ($blog as $blog)
<h1 class="mt-3">{{$blog->title}}</h1>
    <div class="row">
           @if ($blog->poto_profile() === 'default.png')
                     <div class="col-md-1"> <a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}" class="text-dark"> <img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div>

                    @else
                     <div class="col-md-1"> <a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}" class="text-dark"> <img src="{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div>

                    @endif
             <p class="pt-2 pl-2 h5">{{$blog->author}} <br>
            <span style="font-size:12px;">{{$blog->created_at->day}}-{{$blog->created_at->month}}-{{$blog->created_at->year}}</span>
            </a></p>
    </div>
    <img src="/storage/img/{{$blog->thumbnail}}" alt="" width="100%;" class="mt-4 mb-3">

    {!!$blog->isi!!}
     <span style="font-size:15px; background-color:red; padding:8px ; border-radius:10px;" class="text-white pl-3 pr-3">{{$blog->category}}</span> 
    

                  
                       @guest
                         
                            @if (Route::has('register'))
                              
                            @endif
                        @else
                         @if (Auth::user()->name === $blog->author)
                <a href="{{Route('delete',$blog->id)}}" class="btn btn-danger">Delete</a>
                     @endif
                        @endguest

    <br>
    <br>
<form action="{{Route('create_comment')}}" method="post">
    @csrf
        <input type="text" class="form-control" name="isi">
    <input type="text" class="form-control" name="title" value="{{$blog->slug}}" hidden >
    <input type="submit" name="" id="">
    </form>
    <br>
     @endforeach

    @foreach ($comment as $data)
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    {{$data->author}}

                </div>
                 <div class="col-md-10">
                    
                     <h1>{{$data->isi_comment}}</h1>
                </div>
            </div>
        </div>
    </div>
    
@endforeach  
</div>
   --}}






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
					<a target="_blank" href="https://twitter.com/home?status=http%3A//www.wowthemes.net">
					<svg class="svgIcon-use" width="29" height="29" viewbox="0 0 29 29"><path d="M21.967 11.8c.018 5.93-4.607 11.18-11.177 11.18-2.172 0-4.25-.62-6.047-1.76l-.268.422-.038.5.186.013.168.012c.3.02.44.032.6.046 2.06-.026 3.95-.686 5.49-1.86l1.12-.85-1.4-.048c-1.57-.055-2.92-1.08-3.36-2.51l-.48.146-.05.5c.22.03.48.05.75.08.48-.02.87-.07 1.25-.15l2.33-.49-2.32-.49c-1.68-.35-2.91-1.83-2.91-3.55 0-.05 0-.01-.01.03l-.49-.1-.25.44c.63.36 1.35.57 2.07.58l1.7.04L7.4 13c-.978-.662-1.59-1.79-1.618-3.047a4.08 4.08 0 0 1 .524-1.8l-.825.07a12.188 12.188 0 0 0 8.81 4.515l.59.033-.06-.59v-.02c-.05-.43-.06-.63-.06-.87a3.617 3.617 0 0 1 6.27-2.45l.2.21.28-.06c1.01-.22 1.94-.59 2.73-1.09l-.75-.56c-.1.36-.04.89.12 1.36.23.68.58 1.13 1.17.85l-.21-.45-.42-.27c-.52.8-1.17 1.48-1.92 2L22 11l.016.28c.013.2.014.35 0 .52v.04zm.998.038c.018-.22.017-.417 0-.66l-.498.034.284.41a8.183 8.183 0 0 0 2.2-2.267l.97-1.48-1.6.755c.17-.08.3-.02.34.03a.914.914 0 0 1-.13-.292c-.1-.297-.13-.64-.1-.766l.36-1.254-1.1.695c-.69.438-1.51.764-2.41.963l.48.15a4.574 4.574 0 0 0-3.38-1.484 4.616 4.616 0 0 0-4.61 4.613c0 .29.02.51.08.984l.01.02.5-.06.03-.5c-3.17-.18-6.1-1.7-8.08-4.15l-.48-.56-.36.64c-.39.69-.62 1.48-.65 2.28.04 1.61.81 3.04 2.06 3.88l.3-.92c-.55-.02-1.11-.17-1.6-.45l-.59-.34-.14.67c-.02.08-.02.16 0 .24-.01 2.12 1.55 4.01 3.69 4.46l.1-.49-.1-.49c-.33.07-.67.12-1.03.14-.18-.02-.43-.05-.64-.07l-.76-.09.23.73c.57 1.84 2.29 3.14 4.28 3.21l-.28-.89a8.252 8.252 0 0 1-4.85 1.66c-.12-.01-.26-.02-.56-.05l-.17-.01-.18-.01L2.53 21l1.694 1.07a12.233 12.233 0 0 0 6.58 1.917c7.156 0 12.2-5.73 12.18-12.18l-.002.04z"></path></svg>
					</a>
					</li>
					<li>
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//www.wowthemes.net">
					<svg class="svgIcon-use" width="29" height="29" viewbox="0 0 29 29"><path d="M16.39 23.61v-5.808h1.846a.55.55 0 0 0 .546-.48l.36-2.797a.551.551 0 0 0-.547-.62H16.39V12.67c0-.67.12-.813.828-.813h1.474a.55.55 0 0 0 .55-.55V8.803a.55.55 0 0 0-.477-.545c-.436-.06-1.36-.116-2.22-.116-2.5 0-4.13 1.62-4.13 4.248v1.513H10.56a.551.551 0 0 0-.55.55v2.797c0 .304.248.55.55.55h1.855v5.76c-4.172-.96-7.215-4.7-7.215-9.1 0-5.17 4.17-9.36 9.31-9.36 5.14 0 9.31 4.19 9.31 9.36 0 4.48-3.155 8.27-7.43 9.15M14.51 4C8.76 4 4.1 8.684 4.1 14.46c0 5.162 3.75 9.523 8.778 10.32a.55.55 0 0 0 .637-.543v-6.985a.551.551 0 0 0-.55-.55H11.11v-1.697h1.855a.55.55 0 0 0 .55-.55v-2.063c0-2.02 1.136-3.148 3.03-3.148.567 0 1.156.027 1.597.06v1.453h-.924c-1.363 0-1.93.675-1.93 1.912v1.78c0 .3.247.55.55.55h2.132l-.218 1.69H15.84c-.305 0-.55.24-.55.55v7.02c0 .33.293.59.623.54 5.135-.7 9.007-5.11 9.007-10.36C24.92 8.68 20.26 4 14.51 4"></path></svg>
					</a>
                    </li>
                    	{{-- <li> --}}
                        <details-post idartikel="{{json_encode($blog->id)}}" iduser="{{json_encode(Auth::user()->id)}}"/>
                            {{-- @if (Auth::user() == !null)
                                  @if ($favoriteCount == 1)
                            <a href="{{Route('deletefavorite',$blog->id)}}">  <i class="fas fa-lg fa-bookmark"></i> </a>
                            @else
                            <a target="" href="{{Route('favorite',$blog->id)}}"><i class="far fa-lg fa-bookmark"></i></a>
                            @endif
                            @else
                            <a target="" href="{{Route('register')}}"><i class="far fa-lg fa-bookmark"></i></a>
                            @endif
                          
                      </li>
                      	<li>
                            @if (Auth::user() == !null)
                                  @if ($likeCount == 1)
                            <a href="{{Route('deletelike',$blog->id)}}">  <i class="fas fa-lg  fa-heart"></i></a>
                            @else
                            <a target="" href="{{Route('like',[$blog->id,$blog->author_id])}}"><i class="far  fa-lg  fa-heart"></i></a>
                            @endif
                            @else
                            <a target="" href="{{Route('register')}}"><i class="far fa-lg  fa-heart"></i></a>
                            @endif
                          
                      </li> --}}
				</ul>
			
			</div>
		</div>
		<!-- End Fixed Left Share -->

		<!-- Begin Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">
			
            <h1 class="posttitle text-center" style="font-size:42px;border-bottom:1px solid black; padding-bottom:20px;">{{$blog->title}}</h1>
			</div>
        <img class="featured-image img-fluid" src="/storage/img/{{$blog->thumbnail}}" alt="">
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
                    @guest
                         
                            @if (Route::has('register'))
                              
                            @endif
                        @else
                         @if (Auth::user()->name === $blog->author)
                <a href="{{Route('delete',$blog->id)}}" class="btn btn-danger">Delete</a>
                     @endif
                        @endguest
                        <span class="float-right"> {{$like_count}} <i class="far  fa-heart"></i></span> 
                </ul>
            </div>
            	<div class="row post-top-meta">
					<div class="col-md-2">
						<a href="/profile/{{$blog->provider_id()}}/{{$blog->author_id}}">    
                             @if ($blog->poto_profile() === 'default.png')
                        <img class="author-thumb" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal">
                    @else
                        <img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
                    @endif
                        </a>
					</div>
					<div class="col-md-10 mt-3">
                    <a class="link-dark" href="author.html">{{$blog->author}}</a>
                    
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

                <input type="text" class="form-control" name="title" value="{{$blog->slug}}" hidden >
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
                     <h3 class="pt-4">{{$data->isi_comment}}</h3>
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
