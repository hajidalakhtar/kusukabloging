@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')

{{-- <script>
    tinymce.init({
    selector: '#mytextarea',
  
  }); --}}
<!-- medium editor -->
<script src="//cdn.jsdelivr.net/npm/medium-editor@5.23.2/dist/js/medium-editor.min.js" type="application/javascript">
</script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@5.23.2/dist/css/medium-editor.min.css" type="text/css"
    media="screen" charset="utf-8">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{Route('store')}}" method="Post" enctype="multipart/form-data">
                @csrf
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




                <label for="">Thumbail</label> <br>
                <input type="file" name="img"> <br>
                <input type="submit" name="" id="" class="btn btn-primary mt-4">

            </form>
        </div>
    </div>
</div>

@endsection