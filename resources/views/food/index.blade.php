@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Semua Menu</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($foods) > 0)
                                @foreach ($foods as $key=>$food)
                                <tr>
                                    <td><img width = 100 src="{{ asset('images') }}/{{$food->image}}" alt=""></td>
                                    <td>{{$food->name}}</td>
                                    <td>{{$food->description}}</td>
                                    <td>Rp {{$food->price}}</td>
                                    <td>{{$food->category->name}}</td>
                                    <td><a href="{{route('food.edit',[$food->id])}}"><button class="btn btn-success">Edit</button></a></td>
                                    <td>
                                        <!--Tombol hapus-->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$food->id}}">
                                            Delete
                                        </button>
                                  
      
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf
                                                {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Are you sure?
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">Belum ada Makanan</div>
                            @endif
                        </tbody>
                    </table>
                    {{ $foods->links('pagination::bootstrap-4') }}
                    <a href="/food/create"><button class="btn btn-outline-primary">Tambah Makanan</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
