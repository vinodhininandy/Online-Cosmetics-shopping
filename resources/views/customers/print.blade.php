<!DOCTYPE html>
<html>
<head>
    <title>Print Customer Details</title>
    <style>
        body {
            font-family: 'Baskerville Old Serial', serif;
            background-color: #f4f4f4;
        }
        .header {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
            justify-content: center; /* Center items horizontally */
            margin-bottom: 20px; /* Add margin to separate header from content */
        }
        .header .company-logo {
            width: 150px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-right: 20px; /* Add spacing between logo and title */
        }
        h1 {
            margin: 0; /* Remove default margin for h1 */
            color: pink; /* Font color for h1 tag */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        img.customer-image {
            max-width: 200px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* Center the image */
            display: block; /* Ensure the image is a block element */
        }
        p {
            margin-bottom: 10px;
            text-align: center; /* Center-align text */
        }
        .details-grid {
            display: grid; /* Use grid layout for details */
            grid-template-columns: auto 1fr; /* Name column and value column */
            grid-column-gap: 10px;
            gap: 30px; /* Add gap between rows */
        }
        .details-grid p {
            margin: 5px 0;  /* Remove default margin for paragraphs */
        }
        .details-grid .name {
            font-weight: bold; /* Bold font for names */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px; /* Increase padding for better spacing */
            text-align: left;
            border-bottom: 1px solid #ddd; /* Add bottom border to rows */
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333; /* Darken header text color */
        }
        td {
            color: #666; /* Color for data cells */
        }
        .bold-text {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="\images\logo-black.png" alt="Company Logo" class="company-logo">
            <h1>Customer Details</h1>
        </div>
        <table>
            <tr>
                <th>Name</th>
                <td>{{ $customer->First_Name }} {{ $customer->Last_Name }}</td>
            </tr>
            <tr>
                <th>Phone No</th>
                <td>{{ $customer->Phone_No }}</td>
            </tr>
            <tr>
                <th>Email Id</th>
                <td>{{ $customer->Email_Id }}</td>
            </tr>
            <tr>
                <th>DOB</th>
                <td>{{ $customer->DOB }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $customer->Gender }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->Address }}</td>
            </tr>
        </table>
        
        <!-- Display customer image if available -->
        @if($customer->Sample_Photo)
            <img src="{{ asset('storage/images/' . $customer->Sample_Photo) }}" alt="Customer Image" class="customer-image">
        @else
            <p>No Image</p>
        @endif
        
        <p class="bold-text">Product Description: {{ $customer->Description }}</p>
        <!-- Add more details here as needed -->
    </div>
</body>
</html>
