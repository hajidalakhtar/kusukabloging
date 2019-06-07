@extends('layouts.app')

@section('content')

<div class="container text-center mt-5">
    <h1>Pembayaran via Transfer Bank BNI</h1>
    <h2>Nomor Pesanan : {{$kode}}</h2>
    <p> Silahkan transfer sebesar:</p>

    <h1> Rp 200.000</h1>
    <p> ke nomor rekening <b>0302916703</b> a/n <b>Muhammad Hajid Al Akhtar</b> <br> Bank :</p>
    <img src="{{asset('image/bank-bni.png')}}" alt="" width="150px;"> <br>
    <div class="card mx-auto mt-5" style="width:30%;">
        <div class="card-body">
            <h4>Upload Bukti Pembayaran</h4>
            <form action="{{Route('uploadBukti',$kode)}}" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" class="mt-2" width="100%">
                <input type="submit" class="float-right mt-3 btn btn-primary">
        </div>
        </form>
    </div>
</div>


</div>

@endsection