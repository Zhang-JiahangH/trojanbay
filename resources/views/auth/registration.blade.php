@extends('layout.main')

@section('title', 'Register')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">User Registration</h1>
        </div> <!-- .row -->
    </div> <!-- .container -->

    <div class="container">
        <form action="{{ route('registration.create') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label text-sm-right">Username: <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name">
                    @error("name")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> <!-- .form-group -->

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-sm-right">Email: <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email">
                    @error("email")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> <!-- .form-group -->	

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    @error("password")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> <!-- .form-group -->

            <div class="form-group row">
                <label for="privilege" class="col-sm-3 col-form-label text-sm-right">privilege:</label>
                <div class="col-sm-9">
                <select name="privilege" id="privilege" class="form-control">
                    <option value='1'>consumers</option>
                    <option value='2'>sellers</option>
                </select>
            </div>

            <div class="row">
                <div class="ml-auto col-sm-9">
                    <span class="text-danger font-italic">* Required</span>
                </div>
            </div> <!-- .form-group -->

            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 mt-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="homepage.php" role="button" class="btn btn-light">Cancel</a>
                </div>
            </div> <!-- .form-group -->

            <div class="row">
                <div class="col-sm-9 ml-sm-auto">
                    <a href="{{ route('login') }}">Already have an account</a>
                </div>
            </div> <!-- .row -->

        </form>
    </div> <!-- .container -->

@endsection