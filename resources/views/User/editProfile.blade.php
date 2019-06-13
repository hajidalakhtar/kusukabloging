@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')
<h1 class="text-center mt-3">Edit profile</h1>
<div class="container" style="width:900px;">
    <form action="{{route('update',$user->id)}}" method="post">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <label for="">Nama</label>
                <input type="text" name="name" id="" class="form-control" value="{{$user->name}}">
            </div>
            <div class="col-md-6">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{$user->email}}">
            </div>
            <textarea name="description" id="" cols="30" rows="10"
                class="col-md-12 mt-5 form-control">{{$user->description}}</textarea>


        </div>
        <input type="submit" value="Update" class="btn btn-primary float-right mt-4">

    </form>

    {{-- <form action="" method="post">
    <input type="file">
</form> --}}

</div>
@endsection