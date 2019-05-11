@extends('layouts.app')
@section('content')

{{-- <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xq47pkcma5pd50cj6jpn1bhnmqshtwc6s9m95uagz0untgg3'></script>
<script>
    tinymce.init({
    selector: '#mytextarea'
  });

</script> --}}
<!-- Begin Article
================================================== -->

@foreach ($blog as $blog)

<div class="container">
    <div class="row">
        <div class="col-md-2 col-xs-12">
            <div class="share mt-5">

                <ul>
                    <li>

                        @guest @if (Route::has('register')) @endif @else @if (Auth::user()->name === $blog->author)
                        <a href="{{Route('delete',$blog->id)}}"><i class="fa-2x fas fa-trash text-dark"></i></a> @endif
                        @endguest
                    </li>
                    @guest @else
                    <details-post idartikel="{{json_encode($blog->id)}}" iduser="{{json_encode(Auth::user()->id)}}" />
                    @endguest


                </ul>


                <ul>
                    <li>
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

                <h1 class="posttitle text-center" style=";border-bottom:1px solid black; padding-bottom:20px;">
                    {{$blog->title}}
                </h1>
            </div>
            <img class="featured-image img-fluid" src="{{asset('/image/'.$blog->thumbnail)}}" alt="">
            <div class="article-post">
                {!!$blog->isi!!}
            </div>
            <div class="after-post-tags">
                <ul class="tags">
                    <li><a href="#">{{$blog->category}}</a></li>

                    <span class="float-right"> {{$like_count}} <i class="far  fa-heart"></i></span>
                </ul>
            </div>
            <div class="row post-top-meta">
                <div class="col-md-2 img-rp">
                    <a href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">
                        @if ($blog->poto_profile() === 'default.png')
                        <img class="author-thumb" src="{{asset('/storage/img/'.$blog->poto_profile())}}" alt="Sal">
                        @else
                        <img class="author-thumb" src="{{$blog->poto_profile()}}" alt="Sal">
                        @endif
                    </a>
                </div>
                <div class="col-md-10 mt-3">
                    <a class="link-dark"
                        href="{{Route('myprofile',[$blog->provider_id(),$blog->author_id])}}">{{$blog->author}}</a>
                    @if ($member =='Pro')
                    <img src="{{asset('image/star.svg')}}" alt="" width="5%" class="mb-1 mr-2">
                    @else

                    @endif

                    <br>
                    <span class="author-description">{{$blog->description()}}</span>
                    <br>
                    <span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min
                        read</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="rp-container">
    <h4 class="h2 ml-3"><b> Comment</b></h4>
    <form action="{{Route('create_comment')}}" method="post" class="ml-3">
        @csrf
        <div class="row">
            <div class="col-md-12">
                {{-- <textarea name="isi" id="mytextarea"> --}}
                <input type="text" class="form-control" name="isi">
                {{-- </textarea> --}}
                <input type="text" class="form-control" name="title" value="{{$blog->id}}" hidden>
            </div>
            <input type="submit" name="" id="" class="btn btn-primary mt-4 ml-3">
        </div>
    </form>
    <br>

    @if (count($comment) >= 1) @foreach ($comment as $data)
    <div class='container' style="width:100%;">
        <div class="media comment-box">

            <div class="media-body" style="word-wrap: break-word; width:100%;">

                <h4 class="media-heading">
                    <a href="author.html">
                        @if ($data->poto_profile() === 'default.png')
                        <img class="rounded" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal">
                        @else
                        <img class="rounded" src="{{$data->poto_profile()}}" alt="Sal" width="100px;">

                        @endif

                    </a> {{$data->author}}
                    {{-- {{dd($data)}} --}}
                    {{-- {{$data->member}} --}}
                    @if ($data->member == 'Pro')
                    <img src="{{asset('image/star.svg')}}" alt="" style="width: 3%;" class="mb-1">
                    @else

                    @endif
                    <br>

                </h4>
                <h4 class="pt-3 pb-3">{{$data->isi_comment}}</h4>

            </div>
        </div>
    </div>
    @endforeach
    <div class="mt-3">
        {{ $comment->links() }}
    </div>
    @else
    <h1 class="text-center mt-5">Tidak Ada Comment</h1>

    @endif
</div>
@endsection