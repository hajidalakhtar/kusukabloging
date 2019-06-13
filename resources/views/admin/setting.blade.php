@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')


<div class="container mt-5">
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Web Name</h4>
            <form action="{{Route('submitSetting')}}">
                <input type="text" name="app_name" class="form-control" placeholder="Web Name"
                    value="{{$setting->app_name}}">
                <h4 class="card-title mt-4">Deskripsi</h4>
                <textarea class="form-control " name="deskripsi" id="" cols="30"
                    rows="10">{{$setting->deskripsi}}</textarea>
                <h4 class="card-title mt-4">Copyright</h4>
                <input type="text" name="copyright" value="{{$setting->copyright}}" class="form-control mt-3">
                <h4 class="card-title mt-4">Category 1</h4>
                <input type="text" class="form-control" name="category_1" value="{{$setting->category_1}}">
                <h4 class="card-title mt-4">Category 2</h4>
                <input type="text" class="form-control" name="category_2" value="{{$setting->category_2}}">
                <h4 class=" card-title mt-4">Category 3</h4>
                <input type="text" class="form-control" name="category_3" value="{{$setting->category_3}}">
                <h4 class=" card-title mt-4">Category 4</h4>
                <input type="text" class="form-control" name="category_4" value="{{$setting->category_4}}">

                <input type="submit" class="btn btn-primary mt-2 float-right">
            </form>

        </div>
    </div>
</div>

@endsection