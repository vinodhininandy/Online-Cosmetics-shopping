<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the login form */
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("images/top-view-make-up-accessories-with-copy-space.jpg");
            background-size: cover;
            background-position: center;
        }

        /* Style the login box */
        .login-box {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
        }
       
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
    <div class="login-container">
        <div class="login-box">
            <!-- Session Status -->
            <div class="alert alert-info mb-4" role="alert">
                {{ session('status') }}
            </div>

            <h3 class="text-center mb-4">{{ __('Login') }}</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="text-danger" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="text-danger" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <div class="d-grid gap-2">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link mb-3" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>