@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            <a href="/food"><button class="btn btn-primary">Kembali</button></a><br>
            <form action="{{route('food.update',[$food->id])}}" method="POST" enctype="multipart/form-data">@csrf
                {{method_field('PUT')}}
                <div class="card">
                    <div class="card-header">Manage Food Category</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$food->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{$food->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$food->price}}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select name="category" id="form-control @error('category') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}" @if($category->id==$food->category_id)selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
