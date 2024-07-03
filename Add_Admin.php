<?php
// Initialize variables to store form data and error message
$name = $email = $password = $emailExistError = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'digital');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to check if the admin email already exists
    $checkEmailQuery = "SELECT * FROM Admins WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Admin email already exists, set error message
        $emailExistError = "Admin Email Already Exists";
    } else {
        // Admin email does not exist, proceed with adding admin
        // Prepare and execute SQL query to insert new admin into database
        $sql = "INSERT INTO Admins (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Admin added successfully, redirect to admins dashboard
            header("Location: Admin_Dash.php");
            exit();
        } else {
            // Error occurred while adding admin
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
            background-size: cover;
            height: 100vh;
        }

        .card {
            border-radius: 12px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            background-color: #007bff;
    border-color: #007bff;
    width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.936);
            border: none;
        }

        .card-body {
            color: #454545;
        }

        .contain {
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .contain .image {
            width: 80%;
        }

        .contain .image img {
            width: 80%;
            height: 100%;
        }

        #phone {
            outline: 0;
        }
        .btn-primary.btn-block {
    background-color: #007bff;
    border-color: #007bff;
    width: 100%; /* Make the button fill the width of its container */
}

.btn-primary.btn-block:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Add Admin</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <!-- Display error message if admin email exists -->
                            <span class="error-message"><?php echo $emailExistError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
