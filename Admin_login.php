<?php
session_start(); // Start the session

$response = array();

// Check if the login form is submitted
if(isset($_POST['login'])) {
    // Retrieve form data
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $db_password = ""; // Replace with your database password
    $database = "digital"; // Replace with your database name

    $conn = new mysqli($servername, $username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user exists in the admins table
    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['admin_id']; // Store the ID of the logged-in admin
        $response['login_success'] = true;
    } else {
        $response['login_success'] = false;
        $response['login_message'] = "Invalid email or password";
    }

    $conn->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
            background-size: cover;
            height: 100vh;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .card {
            width: 350px;
        }

        #loginError {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Admin Login</h2>
                <form id="loginForm" method="post">
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                        <div id="loginError" class="text-danger"></div> <!-- Error message container -->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginForm = document.getElementById("loginForm");

            // Login form submission
            loginForm.addEventListener("submit", function(event) {
                event.preventDefault();

                // Retrieve form data
                const email = document.getElementById("loginEmail").value;
                const password = document.getElementById("loginPassword").value;

                // Send login request using AJAX
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.login_success) {
                                // Redirect to Dashboard.php
                                window.location.href = "Dashboard.php";
                            } else {
                                // Display login error
                                const loginError = document.getElementById("loginError");
                                loginError.textContent = response.login_message;
                            }
                        } else {
                            console.error("Login request failed:", xhr.status);
                        }
                    }
                };
                xhr.send("login=1&loginEmail=" + encodeURIComponent(email) + "&loginPassword=" + encodeURIComponent(password));
            });
        });
    </script>
</body>
</html>
