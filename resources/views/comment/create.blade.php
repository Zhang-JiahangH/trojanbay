@extends("layout.main")

@section("title", "comment")

@section("content")
<div class="row">
    <div class="col-lg-6 offset-lg-3" style="padding: 5%;">
        <form class="pb-3 border-bottom mb-3" action="{{route('comment.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3 d-none">
                <textarea name="product_id" class="form-control">{{old('product_id', $product_id)}}</textarea>
            </div>
            <div class="form-group mb-3">
                <textarea name="comment" class="form-control" placeholder="{{old('comment')}}">{{old('comment')}}</textarea>
            </div>
            <div>
                @error("comment")
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">
                Submit Comment
            </button>
        </form>
    </div>
</div>
@endsection