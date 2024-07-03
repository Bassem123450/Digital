<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email_error = ''; // Initialize email error message variable

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // You might want to hash the password before storing it in the database
    $phone_number = $_POST['phone_number'];

    // Check if email already exists in the database
    $check_email_sql = "SELECT * FROM Clients WHERE email='$email'";
    $check_email_result = $conn->query($check_email_sql);

    if ($check_email_result->num_rows > 0) {
        // Email already exists, set error message
        $email_error = 'Email Already Exist';
    } else {
        // Prepare and execute SQL query to insert new client into database
        $sql = "INSERT INTO Clients (name, email, password, phone_number) VALUES ('$name', '$email', '$password', '$phone_number')";

        if ($conn->query($sql) === TRUE) {
            // Client added successfully, redirect to dashboard
            header("Location: Dashboard.php");
            exit();
        } else {
            // Error occurred while adding client
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Client</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
      background-size: cover;
      height: 100vh;
    }

    .card {
      border-radius: 12px;
      background-color: rgba(255, 255, 255, 0.936);
      border: none;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-body">
            <h2 class="text-center mb-4">Add Client</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <?php if (!empty($email_error)) { ?>
                    <small class="text-danger"><?php echo $email_error; ?></small>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add Client</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
