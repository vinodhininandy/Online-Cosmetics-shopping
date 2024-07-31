<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->

        <label for="First_Name">First Name:</label><br>
        <input type="text" id="First_Name" name="First_Name" value="{{ $customer->First_Name }}"><br>

        <label for="Last_Name">Last Name:</label><br>
        <input type="text" id="Last_Name" name="Last_Name" value="{{ $customer->Last_Name }}"><br>

        <label for="Phone_No">Phone Number:</label><br>
        <input type="text" id="Phone_No" name="Phone_No" value="{{ $customer->Phone_No }}"><br>

        <label for="Email_Id">Email ID:</label><br>
        <input type="Email_Id" id="Email_Id" name="Email_Id" value="{{ $customer->Email_Id }}"><br>

        <label for="DOB">DOB:</label><br>
        <input type="date" id="DOB" name="DOB" value="{{ $customer->DOB }}"><br>

        <label for="Gender">Gender:</label>
        <input type="radio" id="Gender" name="Gender" value="Male">
        <label for="Gender">Male</label><br>
        <input type="radio" id="Gender" name="Gender" value="Female">
        <label for="Gender">Female</label><br>
        <input type="radio" id="Gender" name="Gender" value="Others">
        <label for="Gender">Others</label><br>

        <label for="Address">Address:</label><br>
        <input type="text" id="Address" name="Address" value="{{ $customer->Address }}"><br>

        <label for="Sample_Photo">Sample Image of Product:</label><br>
        <input type="file" id="Sample_Photo" name="Sample_Photo"><br>

        <label for="Description">Description:</label><br>
        <input type="text" id="Description" name="Description" value="{{ $customer->Description }}"><br><br>

        <button type="submit">Update</button>

    </form>
</body>
</html>