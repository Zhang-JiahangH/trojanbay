@extends('layout.main')

@section('title', 'Home')

@section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" id="first-img">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Fight On, Trojans!</h1>
            <p class="lead fw-normal">A place to share second-hand goods information, including but not limited to graduate students' surplus goods or unused items, used textbooks, free tickets in the student package, etc.</p>
            <a class="btn btn-danger" href="{{ route('search.index') }}">Start  Navigate</a>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <a href="{{ route('textbook.index') }}"><div class="bg-white me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-danger overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Textbooks</h2>
                <p class="lead">New or second-hand textbook with relatively low price</p>
            </div>
            <img src="https://m.media-amazon.com/images/I/71qbM7KHDdL._AC_UL640_FMwebp_QL65_.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;">
        </div></a>
        <a href="{{ route('technology.index') }}"><div class="bg-pink me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Technology</h2>
                <p class="lead">Trade or buy a wide selection of discounted technology products</p>
            </div>
            <img src="https://media-cldnry.s-nbcnews.com/image/upload/newscms/2020_48/3431409/201127-apple-products-mc-1556.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;">
        </div></a>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
        <a href="{{ route('ticket.index') }}"><div class="bg-black me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-danger overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Tickets</h2>
                <p class="lead">Don't miss tickets information for the incoming events</p>
            </div>
            <img src="https://seatgeek.com/images/image_uploads/category/mlb-xxlarge@2x.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;">
        </div></a>
        <a href="{{ route('other.index') }}"><div class="bg-white me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-dark overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Others</h2>
                <p class="lead">There're more valuable and economical deals than you thought</p>
            </div>
            <img src="https://m.media-amazon.com/images/I/61xt-eMcFxL._AC_SL1500_.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;">
        </div></a>
    </div>
@endsection