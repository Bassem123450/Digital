<?php
// Initialize variables to store form data and error message
$name = $email = $password = $emailExistError = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $admin_id = $_POST['admin_id'];
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
    $checkEmailQuery = "SELECT * FROM Admins WHERE email='$email' AND admin_id != $admin_id";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Admin email already exists, set error message
        $emailExistError = "Admin Email Already Exists";
    } else {
        // Admin email does not exist, proceed with updating admin details
        // Prepare and execute SQL query to update admin details in the database
        $sql = "UPDATE Admins SET name = '$name', email = '$email', password = '$password' WHERE admin_id = $admin_id";

        if ($conn->query($sql) === TRUE) {
            // Admin details updated successfully, redirect to admin dashboard
            header("Location: Admin_Dash.php");
            exit();
        } else {
            // Error occurred while updating admin details
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
} else {
    // Fetch admin details from the database
    if(isset($_GET['id'])) {
        $admin_id = $_GET['id'];
        
        // Establish database connection
        $conn = new mysqli('localhost', 'root', '', 'digital');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch admin details based on admin_id
        $sql = "SELECT * FROM Admins WHERE admin_id = $admin_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
        } else {
            echo "Admin not found.";
        }

        // Close database connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        #phone {
            outline: 0;
        }

        /* Add red color for error message */
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center mb-4">Edit Admin</h2>
                    <form method="post">
                        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            <!-- Display error message if admin email exists -->
                            <span class="error-message"><?php echo $emailExistError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Admin</button>
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
