<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Fill Checkout Details</h2>
        <form id="employeeForm" action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Proceed</button>
        </form>
    </div>

    <script>
        // Optionally, you can handle redirection after successful form submission via JavaScript
        // This is useful if you need to do additional processing before redirecting
        document.getElementById('employeeForm').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Submit the form asynchronously
            fetch(this.action, {
                method: this.method,
                body: new FormData(this)
            })
            .then(response => {
                if (response.ok) {
                    // Optionally, do something here after successful form submission
                    // Redirect to checkout page
                    window.location.href = 'http://127.0.0.1:8000/checkout';
                } else {
                    // Handle errors if needed
                    console.error('Form submission failed:', response.status);
                }
            })
            .catch(error => {
                console.error('Error during form submission:', error);
            });
        });
    </script>
</body>
</html>
