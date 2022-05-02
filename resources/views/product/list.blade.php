@extends("layout.product")

@section("title", "products")

@section("content")
    <div class="container-fluid">
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
    </div>
@endsection