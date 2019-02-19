@extends('layouts.app')

@section('content')
@foreach ($user as $user)


 
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <img src="/storage/profile/{{$user->poto }}" alt="" class="rounded-circle">
                <h1 class="text-center mt-3">{{ $user->name }}</h1>
                    <span>10 Folower </span> | <span> 30 Post</span>  @guest
      @if (Route::has('register'))
           @endif
       @else
      @if (Auth::user()->name === $user->name)
                <a href="{{Route('editprofile')}}">Edit Profile</a>
    @else
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
                   <div class="col-md-1"><img src="/storage/profile/{{$blog->poto_profile()}}" alt="" class="rounded-circle pt-1 pl-1 pb-1" width="140%;"></div> <p class="pt-2 pl-2 h5">{{$blog->author}}</p>
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
</div>

@endsection
