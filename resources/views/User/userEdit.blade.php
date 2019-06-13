@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
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
        <form action="{{Route('admin.upload',$blog->id)}}"  method="Post"  enctype="multipart/form-data">
            @csrf
                <label for="">Title</label>
        <input type="text" name="title" value="{{$blog->title}}" class="form-control">
               
                <label for="category">Category</label>
                <select name="category" id="" class="form-control">
                    
                    
                    @if ($blog->category == 'Dev')
                    <option value="Dev" selected>Dev</option>
                    <option value="Bebas" >Bebas</option>
                    <option value="Cerita" >Cerita</option>
                    <option value="Indonesia" >Indonesia</option>
                    @endif

                    @if ($blog->category == 'Bebas')
                    <option value="Dev" >Dev</option>
                    <option value="Bebas"selected >Bebas</option>
                    <option value="Cerita" >Cerita</option>
                    <option value="Indonesia" >Indonesia</option>
                    @endif

                    @if ($blog->category == 'Cerita')
                    <option value="Dev" >Dev</option>
                    <option value="Bebas" >Bebas</option>
                    <option value="Cerita" selected>Cerita</option>
                    <option value="Indonesia"  >Indonesia</option>
                    @endif
                    @if ($blog->category == 'Indonesia')

                    <option value="Dev" >Dev</option>
                    <option value="Bebas" >Bebas</option>
                    <option value="Cerita" >Cerita</option>
                    <option value="Indonesia" selected >Indonesia</option>
                    @endif


                </select>
                <label for="">Isi Artikel</label>

                <div id="mytextarea" >
                    {!!$blog->isi!!}
                </div>

                <br>
                <input type="submit" name="" id="" class="btn btn-primary mt-4">

            </form>
        </div>
    </div>
</div>

@endsection
