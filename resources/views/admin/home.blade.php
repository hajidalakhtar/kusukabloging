@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="card">
    <div class="card-body">
      <h1>USER</h1>
      <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">id_transaksi</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Bukti</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($transaksi as $data)

          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$data->id_transaksi}}</td>
            <td>{{$data->getName()}}</td>
            <td>{{$data->getEmail()  }}</td>
            <td><img src="{{asset('img/'.$data->foto)}}" alt="Sal" width="100px"></td>
            <td><a href="{{Route('terimaPro',$data->id_transaksi)}}" class="btn btn-success">Setujui</a> <a href=""
                class="btn btn-danger">Tolak</a></td>
          </tr>
          @endforeach



        </tbody>
      </table>


    </div>
  </div>




  <div class="card mt-5">
    <div class="card-body">
      <h1>USER</h1>
      <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Members</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($user as $data)

          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            @if ($data->poto === 'default.png')
            <td><img class="author-thumb" src="/storage/profile/{{$data->poto}}" alt="Sal"></td>
            @else
            <td><img class="author-thumb" src="{{$data->poto}}" alt="Sal"></td>
            @endif
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->members  }}</td>
            <td><a href="{{Route('delete.user',$data->id)}}" class="btn btn-danger">Delete</a><a href=""
                class="ml-3 btn btn-warning">Edit</a><a href="" class="ml-3 btn btn-success">View</a></td>
          </tr>
          @endforeach



        </tbody>
      </table>


    </div>
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <h1>Artikel</h1>
      <table class="table mt-4">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Author ID</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col" class="text-center">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($blog as $data)

          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$data->author}}</td>
            <td width='50%;'>
              <p>{{$data->title}}</p>
            </td>
            <td>{{$data->category}}</td>
            <td><a href="{{Route('admin.delete',$data->id)}}" class="btn btn-danger">Delete</a><a
                href="{{Route('admin.edit',$data->id)}}" class="ml-3 btn btn-warning">Edit</a><a
                href="{{Route('details',[$data->id , $data->slug])}}" class="ml-3 btn btn-success">View</a></td>
          </tr>
          @endforeach



        </tbody>
      </table>



    </div>
  </div>
</div>
@endsection