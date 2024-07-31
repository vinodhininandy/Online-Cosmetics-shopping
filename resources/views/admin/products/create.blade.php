<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="form-styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            background-image: url('/images/o.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 350px;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.5); /* Glass-like background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333; /* Label color */
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2); /* Border color */
            transition: border-color 0.3s ease;
            background-color: rgba(255, 255, 255, 0.8); /* Input background color */
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus {
            border-color: #007bff; /* Border color on focus */
            outline: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }

        /* Add align-left class to align the container to the left */
        .align-left {
            text-align: left;
        }

        .logo {
            position: fixed;
            top: 10px; /* Adjust top distance */
            left: 10px; /* Adjust left distance */
            z-index: 9999; /* Ensure logo appears above other elements */
        }
    </style>
</head>
<body>
<div class="header">
    <div class="logo">
        <!-- Your logo here -->
    </div>
</div>
<br>
<br>

<div class="container align-left">
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <h1>Create Product</h1>

    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="prod_name">Product Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter product name">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Enter price">
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" placeholder="Enter brand">
            @error('brand')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter description"></textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_image">Product Image:</label>
            <input type="file" id="image" name="image">
            <!-- Add validation error message for product image if needed -->
        </div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
</body>
</html>
