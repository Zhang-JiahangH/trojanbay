@extends('layout.main')

@section('title', 'Blocked')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <p>{{ Auth::user()->name }}, you're a consumer, you could not access this part.</p>
            <a href="{{route('home')}}">click here to return to the home page</a>
        </div>
    </div>
@endsection 