@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($blog as $blog)
        
          <div class="col-md-6 mt-3">
           <div class="card">
            <div class="row">
              <div class="col-md-1"> <a href="{{Route('myprofile',$blog->author )}}"> <img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="200%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</a></p>
                  </div>
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
</div>
@endsection
