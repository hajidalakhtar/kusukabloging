@extends('layouts.app')

@section('content')
<div class="container" style="width:60%">

    @foreach ($blog as $blog)
<h1 class="mt-3">{{$blog->title}}</h1>
    <div class="row">
           @if ($blog->poto_profile() === 'default.png')
                     <div class="col-md-1"> <a href="{{Route('myprofile',$blog->author )}}" class="text-dark"> <img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div>

                    @else
                     <div class="col-md-1"> <a href="{{Route('myprofile',$blog->author )}}" class="text-dark"> <img src="{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div>

                    @endif
             <p class="pt-2 pl-2 h5">{{$blog->author}} <br>
            <span style="font-size:12px;">{{$blog->created_at->day}}-{{$blog->created_at->month}}-{{$blog->created_at->year}}</span>
            </a></p>
    </div>
    <img src="/storage/img/{{$blog->thumbnail}}" alt="" width="100%;" class="mt-4 mb-3">

    {!!$blog->isi!!}
     <span style="font-size:15px; background-color:red; padding:8px ; border-radius:10px;" class="text-white pl-3 pr-3">{{$blog->category}}</span> 
      @if (Auth::user()->name === $blog->author)
                <a href="{{Route('editprofile')}}" class="btn btn-danger">Delete</a>
       @endif
     @endforeach
    <br>
    <br>
    <br>
    <br>
    
</div>
  
@endsection
