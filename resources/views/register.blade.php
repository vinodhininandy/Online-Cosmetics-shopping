<!DOCTYPE html>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-2">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold mb-2">Password:</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-semibold mb-2">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
