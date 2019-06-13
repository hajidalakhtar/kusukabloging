@extends('layouts.app',['title'=>$setting->app_name,'copyright'=>$setting->copyright,'deskripsi'=>$setting->deskripsi])



@section('content')

<section class="py-5 text-center">
	<div class="container">
		<h2 class="text-center h1 ">Keuntungan Menjadi Pro ?</h2>
		<br>
		<div class="row mt-5">
			<div class=" col-sm-6 col-lg-4 mb-3">
				<img src="image/bitcoin.svg" alt="" width="20%">
				<h5 class="mt-3"><b> Support KusukaBloging</b></h5>
				<p class="text-muted">dengan Membeli (Pro) anda telah membantu Web inih Supaya tetap hidup </p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<img src="image/template.svg" alt="" width="20%">
				<h5 class="mt-3"><b> Themplate</b></h5>
				<p class="text-muted">Kami memeliki beberapa thempalte yang dapat anda pakai</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<img src="image/star.svg" alt="" width="20%">
				<h5 class="mt-3"><b>Bintang</b></h5>
				<p class="text-muted">Mendapatkan Bintang Di Profile Anda</p>
			</div>
		</div>

	</div>

</section>
<div class="jumbotron mt-5 text-center bg-dark">
	<h1 class="text-white"><b>Tunggu apa lagi beli PRO sekarang</b></h1>
	<a href="{{Route('prosesBeli')}}" class="btn btn-primary mt-3">Beli sekarang</a>
</div>
@endsection