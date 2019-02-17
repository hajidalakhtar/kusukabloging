@extends('layouts.app')

@section('content')
 <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xq47pkcma5pd50cj6jpn1bhnmqshtwc6s9m95uagz0untgg3'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="/store"  method="Post"  enctype="multipart/form-data">
            @csrf
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
               
                <label for="category">Category</label>
                <select name="category" id="" class="form-control">
                    <option value="Dev">Dev</option>
                    <option value="bebas">Bebas</option>
                    <option value="cerita">Cerita</option>
                    <option value="indonesia">Indonesia</option>
                    <option value="komputer">Komputer</option>
                </select>
                <label for="">Isi Artikel</label>

                <div id="mytextarea" >
                    </div>

                <br>
                 <label for="">Thumbail</label> <br>
                <input type="file" name="img" > <br>
                <input type="submit" name="" id="" class="btn btn-primary mt-4">

            </form>
        </div>
    </div>
</div>

@endsection
