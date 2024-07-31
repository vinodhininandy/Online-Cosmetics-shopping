
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Crud Operation</title>   
    <style>
        .content {
            background-image: url("/images/Beauty begins the moment.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh; /* Ensure content div covers entire viewport height */
            padding: 20px; /* Add padding for content */
        }

        /* Additional styles for your content */
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
            text-decoration: none; /* Remove underline from links */
            display: inline-flex; /* Ensure proper alignment */
            justify-content: center; /* Center text horizontally */
            align-items: center; /* Center text vertically */
            color: #000; /* Text color */
        }

        .enter:hover {
            background-color: rgb(0, 0, 0);
            color: white;
            text-decoration: none; /* Remove underline from links */
        }
    </style>
</head>
<body class="m">
    <div class="content">
        
    </div>
</body>
</html>
@endsection
