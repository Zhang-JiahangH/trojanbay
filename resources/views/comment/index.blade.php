@extends("layout.main")

@section("title", "comment")

@section("content")
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h2 class="mb-3 p-3">Comments for {{$product->name}}</h2>
            @if (count($comments) == 0)
                <div class="container">
                    <div>
                        <a href="{{route('comment.create', ['product_id' => $product->id])}}">There's no comment now, be the first comment!</a>
                    </div>
                </div>
            @else
                @foreach($comments as $comments)
                    <div class="border border-danger rounded" style="padding: 5%;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="m-0">
                                    {{$comments->body}}
                            </h3>
                        </div>
                        <div class="mt-3 pb-3 mb-3">
                            <em>
                                <?php 
                                    echo 'Posted on ';
                                    $date = date_create($comments->created_at);
                                    echo $date->format('n/j/Y');
                                    echo ' at ';
                                    echo $date->format('g:i A');
                                ?>  
                                by {{$comments->user->name}}
                            </em>
                            @can('view-permit', $comments->user->id)
                                <div class="ml-3">
                                    <a href="{{ route("comment.edit", ['id' => $comments->id]) }}">edit</a>
                                </div>
                                <div class="ml-3">
                                    <a href="{{ route("comment.delete", ['id' => $comments->id, 'product_id' => $comments->product_id]) }}">delete</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                @endforeach
                <div>
                    <a href="{{route('comment.create', ['product_id' => $product->id])}}">click here to post your own comment on this product!</a>
                </div>
            @endif
        </div>
    </div>
@endsection