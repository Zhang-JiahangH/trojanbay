@extends('layout.main')

@section('title', 'Edit')

@section('content')
    <script src="https://app.simplefileupload.com/buckets/a18fb5672f1885de0c865f0487ac0c0e.js"></script>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
    <div class="row">
        <h1 class="col-12 mt-4 mb-4">Edit an Item</h1>
    </div>

    <div class="container">
    <form action="{{ route('product.update', [ 'id' => $product->id ]) }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
                @error("name")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $product->description) }}">
                @error("description")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
                @error("price")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="url" class="form-label">Picture</label>
                <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $product->picture_path) }}">
                @error("url")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre" class="form-select">
                    <option value="">-- Select Genre --</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}" {{ $genre->id === old('genre', $product->genre) ? "selected" : "" }}>
                        {{$genre->name}}
                        </option>
                    @endforeach
                </select>
                @error("genre")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Picture: </label>
                {{-- <input type="text" name="url" id="url" class="form-control" value="{{ old('url') }}"> --}}
                <input type="hidden" name="url" id="url" class="simple-file-upload" value="{{ old('url', $product->picture_path) }}">

                @error("url")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Save
            </button>
            <button type="reset" class="btn btn-light">
                Reset
            </button>
    </form>
    </div>
@endsection