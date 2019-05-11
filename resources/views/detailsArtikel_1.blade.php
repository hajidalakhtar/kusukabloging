@extends('layouts.app')


@section('content')

@foreach ($blog as $blog)

<div class="jumbotron text-center bg-dark">
    <h1 class="display-4 text-white">{{$blog->title}}</h1>
    <p class="text-white">By {{$blog->author}}</p>
</div>
<div class="share  ml-5" style="position:absolute">

    <ul>
        <li>
            @guest @if (Route::has('register')) @endif @else @if (Auth::user()->name === $blog->author)
            <a href="{{Route('delete',$blog->id)}}"><i class="fa-2x fas fa-trash text-dark"></i></a> @endif @endguest
        </li>
        @guest @else
        <details-post idartikel="{{json_encode($blog->id)}}" iduser="{{json_encode(Auth::user()->id)}}" /> @endguest
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
<div class="container" style="width:70%; font-size:20px;">
    {!!$blog->isi!!}
</div>

<div class='container mt-5 ' style="width:70%;">
    <h4 class="h2 ml-3"><b> Comment</b></h4>
    <form action="{{Route('create_comment')}}" method="post" class="ml-3 mb-5">
        @csrf
        <div class="row mt-3">
            <div class="col-md-10">
                {{-- <textarea name="isi" id="mytextarea"> --}}
                <input type="text" class="form-control" name="isi">
                {{-- </textarea> --}}
                <input type="text" class="form-control" name="title" value="{{$blog->id}}" hidden>
            </div>
            <div class="col-md-2">
                <input type="submit" name="" id="" class="btn btn-primary ">
            </div>
        </div>
    </form>
    @if (count($comment) >= 1)
    @foreach ($comment as $data)
    <div class="media comment-box ">

        <div class="media-body" style="word-wrap: break-word; width:100%;">

            <h4 class="media-heading mt-3">
                <a href="">
                    @if ($data->poto_profile() === 'default.png')
                    <img class="rounded" src="/storage/profile/{{$blog->poto_profile()}}" alt="Sal">
                    @else
                    <img class="rounded" src="{{$data->poto_profile()}}" alt="Sal" width="100px;">

                    @endif

                </a> {{$data->author}}
                @if ($data->member == 'Pro')
                <img src="{{asset('image/star.svg')}}" alt="" style="width: 3%;" class="mb-1">
                @else

                @endif
                <br>

            </h4>
            <h4 class="pt-3 pb-3">{{$data->isi_comment}}</h4>

        </div>
    </div>
    @endforeach
</div>
<div class="mt-3">
    {{ $comment->links() }}
</div>
@else
<h1 class="text-center mt-5">Tidak Ada Comment</h1>

@endif
@endforeach
@endsection