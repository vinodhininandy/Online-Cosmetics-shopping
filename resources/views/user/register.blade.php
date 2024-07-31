<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lovelace&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Baskerville Old Serial', serif;
            background-image: url("");
            background-size: cover;
            background-position: center;
            background-size: 94%; 
        }
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 31px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'Baskerville Old Serial', serif;
            height: 482px; /* Example height */
            width: 290px; 
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #d4c9a1;
            color: #5e6681;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #5e6681;
            color: #ffeba7;
        }
        .auth-link {
            text-align: center;
            margin-top: 10px;
        }
        .auth-link a {
            color: #5e6681;
            text-decoration: none;
        }
        
@font-face {
    font-family: 'Tan Pearl';
    src: url('/fonts/tan-pearl.otf') format('opentype'),;
}

/* Apply font-family to elements */
.form-header h2 {
    font-family: 'Tan Pearl', cursive; /* Use 'Eyesome Regular' font */
    font-size: 2rem; /* Adjust the font size if needed */
    font-weight: normal;
}
    </style>
</head>
<body>
<div class="auth-container">
    <div class="form-container">
        <div class="form-header">
            <h2>Register</h2>
        </div>
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('user.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="btn ml-4">Register</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
</body>
</html>
