<?php
session_start(); // Start the session

$response = array();

// Check if the register form is submitted
if(isset($_POST['register'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: It's recommended to hash passwords for security
    $phone_number = $_POST['phone'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $db_password = ""; // Replace with your database password
    $database = "digital"; // Replace with your database name

    $conn = new mysqli($servername, $username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM clients WHERE email='$email'";
    $check_email_result = $conn->query($check_email_query);
    if ($check_email_result->num_rows > 0) {
        $response['register_success'] = false;
        $response['register_message'] = "Email already exists";
    } else {
        // Insert data into the clients table
        $sql = "INSERT INTO clients (name, email, password, phone_number) VALUES ('$name', '$email', '$password', '$phone_number')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, set session variables
            $_SESSION['user_id'] = $conn->insert_id; // Store the ID of the newly registered user

            // Redirect to Home.php
            header("Location: Home.php");
            exit(); // Ensure that script stops execution after redirection
        } else {
            $response['register_success'] = false;
            $response['register_message'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}

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

    // Check if user exists in the clients table
    $sql = "SELECT * FROM clients WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, set session variables
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['client_id']; // Store the ID of the logged-in user
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
    <title>Registration & Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                    <h2 class="text-center mb-4"> <span style="color: #007bff;" ></span> Welcome  <span style="color: #007bff;" ></span> </h2>
                        <div id="formContainer">
                            <!-- Registration form -->
                            <form id="registrationForm" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <?php if(isset($response['register_success']) && $response['register_success'] === false) { ?>
                                    <div class="text-danger"><?php echo $response['register_message']; ?></div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter 11 digit phone number" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                                </div>
                                <div class="text-center">
                                    <a href="#" id="toggleLogin">Already have an account? Login</a>
                                </div>
                            </form>
                            <!-- Login form (Initially hidden) -->
                            <form id="loginForm" method="post" style="display: none;">
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
                                    <button type="submit" class="btn btn-primary btn-block" name="login" id="loginButton">Login</button>
                                </div>
                                <div class="text-center">
                                    <a href="#" id="toggleRegister">Don't have an account? Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleLogin = document.getElementById("toggleLogin");
            const toggleRegister = document.getElementById("toggleRegister");
            const registrationForm = document.getElementById("registrationForm");
            const loginForm = document.getElementById("loginForm");

            // Show registration form, hide login form
            toggleRegister.addEventListener("click", function(event) {
                event.preventDefault();
                registrationForm.style.display = "block";
                loginForm.style.display = "none";
            });

            // Show login form, hide registration form
            toggleLogin.addEventListener("click", function(event) {
                event.preventDefault();
                loginForm.style.display = "block";
                registrationForm.style.display = "none";
            });

            // Login form submission
            const loginButton = document.getElementById("loginButton");
            loginButton.addEventListener("click", function(event) {
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
                                // Redirect to Home.php
                                window.location.href = "Home.php";
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
    <style>
        input[type="number"] ::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
            background-size: cover;
            height: 100vh;
        }
        input[type="number"] {
    -moz-appearance: textfield; /* Firefox */
    -webkit-appearance: none; /* Safari and Chrome */
    appearance: none; /* Modern browsers */
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

    </style>
</body>
</html>
