<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title> Final Project </title>
	<style>
        body,
        html {
            padding: 0;
            margin: 0;
        }

        #head {
            padding-left: 10%;
            padding-right: 10%;
            background-color: rgb(150, 0, 9);
        }

        #main {
            margin-left: auto;
            margin-right: auto;
        }

        .flex-equal>* {
            flex: 1;
        }

        @media (min-width: 768px) {
            .flex-md-equal>* {
                flex: 1;
            }
        }
		@font-face {
			font-family: "apple";
			src: url("fonts/FontsFree-Net-SFCompactDisplay-Regular.ttf");
		}
		html {
			margin: 0;
			padding: 0;
		}
		body {
			font-family: "Roboto", sans-serif;
			margin: 0;
			padding: 0;
		}
		h2 {
			text-align: center;
			margin-bottom: 40px;
		}
		#header {
			margin: 0;
			padding: 0;
			height: 50px;
			line-height: 50px;
			background-color: black;
			background-repeat: no-repeat;
			background-size: contain;
			text-align: center;
		}
		#item {
			background-color: white;
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			max-width: 990px;
		}
		#item h2{
			width: 96%;
			text-align: center;
			margin-bottom: 0;
		}
		#item, #related {
			padding-top: 20px;
			padding-bottom: 30px;
		}
		.item img {
			width: 100%;
		}
		.item .name {
			font-weight: bold;
			text-align: center;
		}
		.item .price {
			text-align: center;
		}
		#item .wrow .item {
			float: left;
			width: 100%;
			box-sizing: border-box;
		}
		#item .wrow .item #product {
			background-size: contain;
			background-color: #cdcdcd;
			padding: 0.5%;
			margin: 0.5%;
			padding-bottom: 0;
			box-sizing: border-box;
		}
		img {
			aspect-ratio: 1/1;
		}
		#item .wrow #info{
			text-align:center;
			float: left;
			width: 50%;
			padding: 0.5%;
			margin: 0.5%;
			box-sizing: border-box;
		}
		#item .wrow #info #judg img{
			width: 100%;
		}
		#item .wrow .item #discount{
			box-sizing: border-box;
			border-width: 10px;
			border: solid;
			border-color: skyblue;
			background-color: lightblue;
			width: 50%;
			margin-top: 5%;
			margin-bottom: 0;
			margin-left: auto;
			margin-right: auto;
			padding-top: 0;
			padding-bottom: 0;
			text-align: center;
		}
		.wrow:after {
			content: "";
			clear: both;
			display: table;
		}
		#related {
			background-color: white;
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			max-width: 990px;
		}
		#related .wrow .item {
			background-color: #cdcdcd;
			float: none;
			width: 60%;
			padding: 10px;
			margin: 3%;
			margin-left:auto;
			margin-right:auto;
			box-sizing: border-box;
			border-width: 10px;
			border: solid;
			border-color: black;
			position: relative;
		}
		#related .wrow .item .tag{
			background-color: rgba(255,0,0,0.3);
			color:black;
			text-align: center;
			font-weight: bold;
			padding-top: 3%;
			padding-bottom: 3%;
			margin: 0;
			width:100%;
			position: absolute;
			right:0;
			bottom: 0;
			visibility: hidden;
			opacity:0.9;
		}
		#related .wrow .item:hover .tag{
			visibility: visible;
		}
		#related .wrow .item:hover img{
			opacity: 0.5;
		}
		#related h2{
			text-align: left;
			margin-left: 1%;
		}
		#footer {
			background-color: black;
			color: white;
			font-size: 10px;
			height: 30px;
			line-height: 30px;
			text-align: center;
		}
		@media (min-width: 767px){

			#item #head2 {
				float:right;
				text-align: left;
				width: 50%
        	}
			#item .wrow .item {
				float: left;
				width: 48%;
				padding: 0.5%;
				margin: 0.5%;
			}
			#related .wrow .item{
				float: left;
				width: 47%;
				margin: 1.5%;
			}
		}
		@media (min-width: 992px){
			#item{
				width: 75%;
				margin-left: auto;
				margin-right: auto;
			}
			#related{
				width: 75%;
				margin-left: auto;
				margin-right: auto;
			}
			#related .wrow .item{
				width: 23%;
				padding: 10px;
				margin: 1%;
			}
		}
        #first-img {
            background-image: url(https://i2.wp.com/wallstreetfatcat.com/wp-content/uploads/2020/07/tommy-trojan.jpg?resize=1400%2C800&ssl=1);
        }
        
        #first-img h1 {
            color: rgb(248, 179, 28);
        }
        
        #first-img p {
            color: white;
        }
        
        .bg-pink {
            background-color: #d63384;
        }

		#detail {
            text-align: center;
            opacity: 1;
            color:black;
            visibility: hidden;
            width: 50%;
            position: fixed;
            top: 5%;
            left: 20%;
            background-color: gray;
        }
        #detail img{
            width: 100%;
        }
	</style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark" id=head>
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
                <img class="bi me-2" src="https://s3.amazonaws.com/file.imleagues/Images/Schools/Uploaded/201607/2016718173021.jpg" width="40" height="40" role="img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li><a href="{{ route('home') }}" class="nav-link px-2 link-primary">Home</a></li>
                    <li><a href="{{ route('textbook.index') }}" class="nav-link px-2 link-dark">Textbook</a></li>
                    <li><a href="{{ route('technology.index') }}" class="nav-link px-2 link-dark">Technology</a></li>
                    <li><a href="{{ route('ticket.index') }}" class="nav-link px-2 link-dark">Tickets</a></li>
                    <li><a href="{{ route('other.index') }}" class="nav-link px-2 link-dark">Others</a></li>
                    <li><a href="{{ route('search.index') }}" class="nav-link px-2 link-dark">Search</a></li>
                </ul>
            </div>
            {{-- login check --}}
            <div class="col-md-3 text-end">

                @if (!Auth::check())
                    <a class="btn btn-outline-danger" href="{{ route('login') }}" role="button">Login</a>
                    <a class="btn btn-outline-warning" href="{{ route('registration.index') }}">Sign-up</a>

                @else
                    <a class="btn btn-outline-danger" href="{{ route('profile.index') }}">Hello, {{ auth()->user()->name }}!</a>
                    <a class="btn btn-outline-warning" href="{{ route('auth.logout') }}">Logout</a>
                @endif

            </div>
        </div>
    </nav>

    <header>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </header>

    <main>
        @yield("content")
    </main>
</body>
