@extends("layout.product")

@section("title", "Shop")

@section("content")
    <div class="container-fluid">
        <h1> Your Products: </h1>
        @if (count($products) == 0)
            <div class="container">
                <div>
                    <a href="{{route('product.create')}}">You don't have any products, clik here to create one!</a>
                </div>
            </div>
        @else
            <div>
                <a href="{{ route('product.create') }}">click here to add a new product</a>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($products as $products)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="d-flex justify-content-center box"><a href="{{ route("product.detail", [ 'id' => $products->id ]) }}"><img src="{{$products->picture_path}}"></a>
                            </div>
                            <div class="d-flex justify-content-center"><a href="{{ route("product.detail", [ 'id' => $products->id ]) }}">{{$products->name}}</a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection