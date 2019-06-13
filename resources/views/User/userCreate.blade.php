@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')

{{-- <script>
    tinymce.init({
    selector: '#mytextarea',
  
  }); --}}
    <!-- medium editor -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{Route('store')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">

                <label for="category">Category</label>
                <select name="category" id="" class="form-control">
                    <option value="Dev">Dev</option>
                    <option value="Bebas">Bebas</option>
                    <option value="Cerita">Cerita</option>
                    <option value="Indonesia">Indonesia</option>
                </select>
                <label for="themes">themes</label>
                <select name="themes" id="" class="form-control">
                    <option value="1">Default</option>
                    @if (Auth::user()->members == "Pro")
                    <option value="2">Pro</option>
                    @else
                    @endif
                </select>


                <label for="">Isi Artikel</label>

             <div class="editable"></div>
   
                <br>
                <label for="">Thumbail</label> <br>
                <input type="file" name="img"> <br>
                <input type="submit" name="" id="" class="btn btn-primary mt-4">

            </form>
        </div>
    </div>
</div>
 
@endsection