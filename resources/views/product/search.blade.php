@extends('layout.main')

@section('title', 'Search')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">Search For Items</h1>
        </div> 
    </div> 
    <div class="container">

        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="item_name" class="col-sm-3 col-form-label text-sm-right">Item Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="item_name" name="item_name">
                </div>
            </div> 
            <div class="form-group row">
                <label for="genre" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
                <div class="col-sm-9">
                    <select name="genre" id="genre" class="form-control">
                        <option value='0' selected>-- All --</option>
                        <option value='1'>Textbook</option>
                        <option value='2'>Technology</option>
                        <option value='3'>Tickets</option>
                        <option value='4'>Others</option>

                    </select>
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 mt-2">
                    <button type="submit" class="btn btn-warning">Search</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div> 
        </form>
    </div> 

@endsection