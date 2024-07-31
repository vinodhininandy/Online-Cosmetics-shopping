<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        nav {
            display: flex;
            justify-content: center;
            padding: 0 60px;
            max-width: 1200px;
            margin: auto;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .content {
            background-image: url("/images/Beauty begins the moment.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            padding: 20px;
        }

        .content .flex {
            justify-content: center;
        }

        .content .fixed {
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .enter {
            height: 35px;
            width: 100px;
            border-radius: 5px;
            border: 2px solid #000;
            cursor: pointer;
            background-color: transparent;
            transition: 0.5s;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 2px;
            margin-bottom: 1em;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #000;
        }

        .enter:hover {
            background-color: rgb(0, 0, 0);
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminDropdown">
                            <a class="dropdown-item" href="{{ route('admin.register') }}">Admin</a>
                            <a class="dropdown-item" href="{{ route('user.register') }}">User</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>

    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>
