<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.0/font/bootstrap-icons.min.css" rel="stylesheet">
  
<!-- Include Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.0/font/bootstrap-icons.min.css" rel="stylesheet">

<title>Customer List</title>
<style>
      
      body {
            /* Other styles */
            background-image: url('/images/wp2581397.webp'); /* Path to your background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            font-family: 'Arial', sans-serif; /* Updated font family for better readability */
            margin: 0;
            padding: 0;
        }
        
        /* Styles from your provided code */
        img {
            width: 200px; /* Set a default width for all images */
            height: auto; /* Maintain aspect ratio */
        }

        img.custom-size {
            width: 300px; /* Set a custom width for images with class "custom-size" */
            height: 150px; /* Set a custom height for images with class "custom-size" */
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
        font-size: 16px; /* Adjust font size as needed */
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f5f5f5; /* Hover color */
    }

        /* Your custom button styles */
        .button {
            position: relative;
            width: 150px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            border: 1px solid #000000;
            background-color: #000000;
        }

        .button,
        .button__icon,
        .button__text {
            transition: all 0.3s;
        }

        .button .button__text {
            transform: translateX(30px);
            color: #fff;
            font-weight: 600;
        }

        .button .button__icon {
            position: absolute;
            transform: translateX(109px);
            height: 100%;
            width: 39px;
            background-color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Additional styles for other elements */
        .svg {
            width: 30px;
            stroke: #fff;
        }

        .button:hover {
            background: #0000000;
        }

        .button:hover .button__text {
            color: transparent;
        }

        .button:hover .button__icon {
            width: 148px;
            transform: translateX(0);
        }

        .button:active .button__icon {
            background-color: #2e8644;
        }
        
        .button:active {
            border: 1px solid #2e8644;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 24vh;
        }

        /* Updated styles for logo image */
        .company-logo {
            width: 200px;
            height: auto;
        }
        h1 {
            font-family: 'Italianno', cursive;
            text-align: center;
            font-size: 46px; /* Adjust the font size as needed */
            margin-bottom: 20px; /* Optional: Add some margin below the h1 */
        }



        
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
       </head>
<body>
<div class="logo-container">
    <img src="/images/logo-no-background.png" alt="Company Logo" class="company-logo">
</div>

<h1>Customer Data</h1>

<button type="button" class="button" onclick="location.href='{{ route('customers.create') }}'">
    <span class="button__text">Add</span>
    <span class="button__icon"><i class="fas fa-plus"></i></span>
</button>

<table>

    <thead>
    <tr>
            <th>S.No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email Id</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Description</th>
            <th>Sample Image</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($customers as $customer)
            @csrf
            @method('PUT')
            <tr class="editable-container" data-customer-id="{{ $customer->id }}"> 
                    <!-- Customer data cells -->
                    <td>  <span class="editable" data-id="{{ $customer->id }}" data-field="id" >{{ $customer->id }} </span></td>
 
            




            
            
                    <td>  <span class="editable" data-id="{{ $customer->id }}" data-field="First_Name" >{{ $customer->First_Name }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Last_Name">{{ $customer->Last_Name }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Phone_No">{{ $customer->Phone_No }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Email"  >{{ $customer->Email_Id }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="DOB"  >{{ $customer->DOB }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Gender"  >{{ $customer->Gender }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Address"  >{{ $customer->Address }} </span></td>
                    <td>  <span class="editable"  data-id="{{ $customer->id }}" data-field="Description"  >{{ $customer->Description }} </span></td>
                

                <td>
                    <!-- Display sample image or "No Image" -->
                    <span class="editable-image" data-id="{{ $customer->id }}" data-field="Sample_Photo">
        <img src="{{ asset('storage/images/' . $customer->Sample_Photo) }}" alt=" " class="editable-image-preview">
    </span>
                </td>
                     
                <td class="actions">

                
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="button" onclick="confirmDelete(event)" title="delete"><i class="fas fa-trash-alt"></i></button>
</form>
                    <script>
    function confirmDelete(event) {
        if (confirm('Are you sure you want to delete this item?')) {
            // If confirmed, submit the form
            event.target.closest('.delete-form').submit();
        }
    }
</script>

                    <!-- Print link -->
                    <a href="{{ route('customers.print', $customer->id) }}" class="btn" target="_blank" title="Print"><i class="fas fa-print"></i></a>
                    <i class="bi bi-pencil edit-icon" style="cursor: pointer;" title="edit"></i>
                    <i class="bi bi-envelope email-icon" style="cursor: pointer;" title="Send Email"></i>
                </td>

                
            </tr>
            @endforeach
            <!-- End of PHP loop -->
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include X-Editable library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
 



<script>



document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listener to each image
    const images = document.querySelectorAll('.customer-image');
    images.forEach(image => {
        const customerId = image.id.split('_')[1]; // Extract customer ID from image ID
        image.addEventListener('click', function() {
            const inputFile = document.querySelector(#image_${customerId} + input[type="file"]);
            if (inputFile) {
                inputFile.click(); // Trigger click on the file input
            }
        });
    });
});

// Function to handle image upload
function handleImageUpload(event, customerId) {
    const imageFile = event.target.files[0];
    if (imageFile) {
        const formData = new FormData();
        formData.append('image', imageFile);

        // Send the formData to the server using fetch
        fetch('/upload-image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if needed
            }
        })
        .then(response => {
            if (response.ok) {
                // Image uploaded successfully, you can handle further actions here
                console.log('Image uploaded successfully');
                // For example, you might want to update the displayed image on the page
                const imageUrl = URL.createObjectURL(imageFile);
                const customerImage = document.querySelector(#image_${customerId});
                customerImage.src = imageUrl;
            } else {
                // Error handling
                console.error('Error uploading image');
            }
        })
        .catch(error => {
            // Error handling
            console.error('Error uploading image:', error);
        });
    }
}











// Function to validate a field
function validateField(fieldName, fieldValue, input) {
    const field = input.closest('.editable');
    if (!fieldValue) {
        input.classList.add('is-invalid');
        // Show error message
        let errorDiv = field.querySelector('.invalid-feedback');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.classList.add('invalid-feedback');
            field.appendChild(errorDiv);
        }
        errorDiv.innerText = `${fieldName.charAt(0).toUpperCase() + fieldName.slice(1)} is required.`;
        return false;
    } else {
        // Remove any existing error message and class
        input.classList.remove('is-invalid');
        const existingError = field.querySelector('.invalid-feedback');
        if (existingError) {
            field.removeChild(existingError);
        }
        // Additional validation for email
        // if (fieldName === 'email' && !/^\S+@\S+\.\S+$/.test(fieldValue)) {
            if (fieldName === 'Email_Id' && !/^\S+@\S+\.\S+$/.test(fieldValue)) {
    
            input.classList.add('is-invalid');
            // Show error message
            let errorDiv = field.querySelector('.invalid-feedback');
            if (!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.classList.add('invalid-feedback');
                field.appendChild(errorDiv);
            }
            errorDiv.innerText = 'Please enter a valid email address.';
            return false;
        }

        // Additional validation for phone number
        if (fieldName === 'Phone_No ') {
            if (!/^\d{10}$/.test(fieldValue)) {
                input.classList.add('is-invalid');
                // Show error message
                let errorDiv = field.querySelector('.invalid-feedback');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.classList.add('invalid-feedback');
                    field.appendChild(errorDiv);
                }
                errorDiv.innerText = 'Phone number must be 10 digits.';
                return false;
            }
        }
    }
    return true;
}

// Function to toggle editable fields and change icon
document.querySelectorAll('.edit-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        const row = this.closest('tr');
        const editIcon = row.querySelector('.edit-icon');
        if (editIcon.classList.contains('bi-pencil')) {
            editIcon.classList.remove('bi-pencil');
            editIcon.classList.add('bi-check');
            row.querySelectorAll('.editable').forEach(field => {
                const input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('value', field.textContent.trim());
                field.innerHTML = '';
                field.appendChild(input);

                // Add input event listener for live validation
                input.addEventListener('input', () => {
                    const fieldName = field.getAttribute('data-field');
                    const fieldValue = input.value.trim();
                    validateField(fieldName, fieldValue, input);
                });

                // Add keypress event listener to prevent typing alphabets in phone number field
                if (field.getAttribute('data-field') === 'Phone_No ') {
                    input.addEventListener('keypress', event => {
                        const key = event.key;
                        if (!/[0-9]/.test(key)) {
                            event.preventDefault();
                        }
                    });
                }
            });
        } else if (editIcon.classList.contains('bi-check')) {
            // Process the update logic here
            let isValid = true; // Flag to track overall validation
            const updatedFields = {};
            row.querySelectorAll('.editable').forEach(field => {
                const fieldName = field.getAttribute('data-field');
                const input = field.querySelector('input');
                const fieldValue = input.value.trim();
                isValid = validateField(fieldName, fieldValue, input) && isValid;
                // Store field value for update
                updatedFields[fieldName] = fieldValue;
            });

            if (isValid) {
                // Send updatedFields to server using AJAX
                fetch('/updateCustomer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(updatedFields)
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Employee updated successfully');
                    } else {
                        console.error('Error updating employee');
                    }
                })
                .catch(error => console.error('Error updating employee:', error));
                // Change icon back to edit
                editIcon.classList.remove('bi-check');
                editIcon.classList.add('bi-pencil');
                row.querySelectorAll('.editable').forEach(field => {
                    const input = field.querySelector('input');
                    field.innerHTML = input.value; // Set the field value to the updated input value
                });
            }
        }
    });
});






    function confirmDelete(event) {
        if (confirm('Are you sure you want to delete this item?')) {
            event.target.closest('.delete-form').submit();
        }
    }
    


    const deleteIcons = document.querySelectorAll('.delete-icon');
            deleteIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    // Find the nearest form and submit it
                    const form = this.closest('.delete-form');
                    form.submit();
                });
            });

</script>
<script>
    // Add event listener to the email icons
    const emailIcons = document.querySelectorAll('.email-icon');
    emailIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            // Find the closest table row
            const row = this.closest('tr');
            // Get the customer's email from the row
            const customerEmail = row.querySelector('.editable[data-field="Email_Id"]').innerText;
            // Construct the mailto link with subject and body
            const subject = encodeURIComponent("Your Order Details");
            const body = encodeURIComponent("Hello,\n\nHere are your order details:\n\n" + "Name: " + row.querySelector('.editable[data-field="name"]').innerText + "\nEmail: " + customerEmail + "\nAddress: " + row.querySelector('.editable[data-field="address"]').innerText + "\nPhone Number: " + row.querySelector('.editable[data-field="phone_no"]').innerText);
            const mailtoLink = `mailto:${customerEmail}?subject=${subject}&body=${body}`;
            // Redirect the user to the mail inbox
            window.location.href = mailtoLink;
        });
    });
</script> 

    

</body>
</html>
