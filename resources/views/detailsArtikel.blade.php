@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($blog as $blog)
    
    <h1 class="text-center mt-3">{{$blog->title}}</h1>
    
    {!!$blog->isi!!}
    @endforeach
</div>
  
@endsection
