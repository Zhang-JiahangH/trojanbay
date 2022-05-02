<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
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
        .box {
            position: relative;
        }
        .container {
            margin-top: 10%;
            margin-bottom: 10%;
        }
        .container img {
            width: 100%;
            aspect-ratio: 210/210;
        }
        a {
            text-decoration: none;
            color: black;
        }
	</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-md navbar-dark" id=head>
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
                <img class="bi me-2" src="https://s3.amazonaws.com/file.imleagues/Images/Schools/Uploaded/201607/2016718173021.jpg" width="40" height="40" role="img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li><a href="{{ route('home') }}" class="nav-link px-2 link-primary">Home</a></li>
                        <li><a href="{{ route('textbook.index') }}" class="nav-link px-2 link-dark">Textbook</a></li>
                        <li><a href="{{ route('technology.index') }}" class="nav-link px-2 link-dark">Technology</a></li>
                        <li><a href="{{ route('ticket.index') }}" class="nav-link px-2 link-dark">Tickets</a></li>
                        <li><a href="{{ route('other.index') }}" class="nav-link px-2 link-dark">Others</a></li>
                        <li><a href="{{ route('search.index') }}" class="nav-link px-2 link-dark">Search</a></li>
                    </ul>
                </ul>
            </div>
            {{-- login check --}}
            <div class="col-md-3 text-end">

                @if (!Auth::check())
                    <a class="btn btn-outline-danger" href="{{ route('login') }}" role="button">Login</a>
                    <a class="btn btn-outline-warning" href="{{ route('registration.index') }}">Sign-up</a>

                @else
                    <a class="btn btn-outline-danger" href=" {{ route('profile.index') }} ">Hello, {{ auth()->user()->name }}!</a>
                    <a class="btn btn-outline-warning" href="{{ route('auth.logout') }}">Logout</a>
                @endif

            </div>
        </div>
    </nav>    

	<main>
        @yield("content")
    </main>
    
</body>
</html>