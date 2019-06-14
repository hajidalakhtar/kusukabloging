@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])
@section('content')

<link rel="stylesheet" href="{{asset('css/medium-editor.css')}}">
<link rel="stylesheet" href="{{asset('css/themes/beagle.css')}}">
<div class="container" style="width:70%;">

    <text-editor />
</div>
<div style="margin-bottom:30%;">

</div>

@endsection