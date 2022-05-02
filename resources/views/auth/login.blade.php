@extends('layout.main')

@section('title', 'Login')
    
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">Welcome Trojans!</h1>
        </div> 
    </div> 

    <div class="container">

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label text-sm-right">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name">
                    @error("name")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> 

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label text-sm-right">Password:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    @error("password")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> 

            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 mt-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('home') }}" role="button" class="btn btn-light">Cancel</a>
                </div>
            </div> 
        </form>

        <div class="row">
            <div class="col-sm-9 ml-sm-auto">
                <a href="{{ route('registration.index') }}">Create an account</a>
            </div>
        </div>

    </div> 

@endsection 