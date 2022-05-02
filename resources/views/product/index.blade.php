@extends('layout.detail')

@section('title', 'detail')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div id="item">
        <div class="wrow">
            <div id="head2">
                <h2>{{ $product->name }}</h2>
            </div>
            <div id="detail">
        
            </div>
            <div class="item">
                <div id="product"><img src="{{ $product->picture_path }}"></div>
            </div>
            <div id="info">
                <h3>Price: ${{ $product->price }}</h3>
                <div id="describe">
                    <p> 
                        {{ $product->description }}
                    </p>
                </div>

                @if (!Auth::check())
                    <a class="btn btn-dark" href="{{ route('login') }}">You should login first</a>
                @endif
                @can('view-buyer')
                    <button type="button" class="btn btn-warning">Directly Buy</button>
                    <button type="button" class="btn btn-danger">Add to cart</button>
                    @if (is_null($bookmark)) 
                        <div>
                            <a class="btn btn-dark" href="{{ route('bookmark.create', ['user_id' => Auth::id(), 'product_id' => $product->id]) }}">Add to Bookmark</a>
                        </div>
                    @else
                        <div>
                            <a class="btn btn-dark" href="{{ route('bookmark.delete', ['user_id' => Auth::id(), 'product_id' => $product->id]) }}">Remove Bookmark</a>
                            <p>added at {{$bookmark->created_at}}</p>
                        </div>
                    @endif
                @endcan
                @can('view-seller')
                    @if (auth()->user()->id == $shop->user_id)
                        <a class="btn btn-dark" href="{{ route('product.edit', ['id' => $product->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('product.delete', ['id' => $product->id]) }}">Delete</a>
                    @else
                        <a class="btn btn-dark" href=" ">This is not your item!</a>
                    @endif
                @endcan
                <div>
                    <a href="{{route('comment.index', ['product_id' => $product->id])}}">Click here to view comments on this product!</a>
                </div>
            </div>
        </div>
    </div>
@endsection