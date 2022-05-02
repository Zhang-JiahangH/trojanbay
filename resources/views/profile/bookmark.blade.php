@extends("layout.product")

@section("title", "bookmark")

@section("content")
    <div class="container-fluid">
        <h1> Your Bookmakrs: </h1>
        @if (count($bookmarks) == 0)
            <div class="container">
                <div>
                    <a href="{{route('home')}}">You don't have any bookmarks, clik here to navigate and create some!</a>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                @foreach ($bookmarks as $bookmarks)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="d-flex justify-content-center box"><a href="{{ route("product.detail", [ 'id' => $bookmarks->product->id ]) }}"><img src="{{$bookmarks->product->picture_path}}"></a>
                        </div>
                        <div class="d-flex justify-content-center"><a href="{{ route("product.detail", [ 'id' => $bookmarks->product->id ]) }}">{{$bookmarks->product->name}}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection