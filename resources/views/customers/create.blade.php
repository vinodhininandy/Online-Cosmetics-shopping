<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/pexels-dan-cristian-pădureț-1377034.jpg'); 
            background-size: cover;
            /* background: rgba(255, 255, 255, 0.5);  */
            color: #0a0000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
            
            
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.5); 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            display: flex;
    flex-direction: column;
    align-items: center; /* Center horizontally */
        }
       
        .company-logo {
            width: 200px; /* Set the width */
            height: auto; /* Maintain aspect ratio */
            align-items: center;
            
        }
        .form-control {
            border-color: #ccc;
        }
        .form-control:focus {
            border-color: #ff7eaf;
            box-shadow: 0 0 5px rgba(255, 126, 175, 0.5);
        }
        .btn-submit {
            background-color: #ff7eaf;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #ff6b9b;
        }
        .custom-label {
            font-weight: bold;
            color: #444;
        }
        .icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    

    <div class="container mt-5">
    <img src="\images\logo-black.png" alt="Company Logo" class="company-logo">
        <h1 class="text-center mb-4">Create Customer</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="First_Name" class="custom-label">First Name:</label>
                <input type="text" class="form-control" id="First_Name" name="First_Name">
            </div>
            <div class="form-group">
                <label for="Last_Name" class="custom-label">Last Name:</label>
                <input type="text" class="form-control" id="Last_Name" name="Last_Name">
            </div>
            
            <div class="form-group">
                <label for="Phone_No" class="custom-label" >Phone Number:</label><br>
                <input type="text" class="form-control"  id="Phone_No" name="Phone_No" >
                @error('Phone_No')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Email_Id" class="custom-label">Email ID:</label>
                <input type="email" class="form-control" id="Email_Id" name="Email_Id">
            </div>
            <div class="form-group">
                <label for="DOB" class="custom-label">DOB:</label>
                <input type="date" class="form-control" id="DOB" name="DOB" required max="{{ now()->subDay()->format('Y-m-d') }}">

            </div>
            <div class="form-group">
                <label class="custom-label">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="Gender_Male" value="Male">
                    <label class="form-check-label" for="Gender_Male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="Gender_Female" value="Female">
                    <label class="form-check-label" for="Gender_Female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="Gender_Others" value="Others">
                    <label class="form-check-label" for="Gender_Others">Others</label>
                </div>
            </div>
            <div class="form-group">
                <label for="Address" class="custom-label">Address:</label>
                <input type="text" class="form-control" id="Address" name="Address">
            </div>
            <div class="form-group">
                <label for="Sample_Photo" class="custom-label">Sample Image of Product:</label>
                <input type="file" class="form-control-file" id="Sample_Photo" name="Sample_Photo">
            </div>
            <div class="form-group">
                <label for="Description" class="custom-label">Description:</label>
                <textarea class="form-control" id="Description" name="Description"></textarea>
            </div>
            <button type="submit" class="btn btn-submit"><i class="fas fa-check-circle icon"></i>Submit</button>
        </form>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>
</html>
