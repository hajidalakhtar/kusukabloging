@extends('layouts.app')

@section('content')
<div class="container" style="width:60%">

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
      @if (Auth::user()->name === $blog->author)
                <a href="{{Route('delete',$blog->id)}}" class="btn btn-danger">Delete</a>
       @endif
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
            <h1>{{$data->isi_comment}}</h1>
        </div>
    </div>
    
@endforeach  
</div>
  
@endsection
