@extends('layout.main')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">Hello {{ auth()->user()->name }}!</h1>

            @can('view-buyer')
                <div class="col-12">You are now a Consumer.</div>
                <div class="col-12 mt-3">You can now view and edit your <a href="{{route('bookmark.index')}}">bookmark page</a></div>
            @endcan
            @can('view-seller')
                <div class="col-12">You are now a Seller.</div>
                <div class="col-12 mt-3">You can now view and edit your <a href="{{route('shop.index')}}">shop page</a></div>
            @endcan
            
        </div>
    </div>
@endsection