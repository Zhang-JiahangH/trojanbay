@extends('layout.main')

@section('title', 'Create')

@section('content')
    <script src="https://app.simplefileupload.com/buckets/a18fb5672f1885de0c865f0487ac0c0e.js"></script>

    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">Create an Item</h1>
        </div>

        <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error("name")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                    @error("description")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    @error("price")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-select">
                        <option value="">-- Select Genre --</option>
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}" {{ (string) $genre->id === old('genre') ? "selected" : "" }}>
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
                    <input type="hidden" name="url" id="url" class="simple-file-upload">
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