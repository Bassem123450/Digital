<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and sanitize
    $client_id = isset($_POST['client_id']) ? $_POST['client_id'] : '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Update client details in the database
    $sql_update = "UPDATE Clients SET name = '$name', email = '$email', phone_number = '$phone_number' WHERE client_id = $client_id";

    if ($conn->query($sql_update) === TRUE) {
        // Redirect to clients_dash.php after successful update
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch client details from the database
if(isset($_GET['id'])) {
    $client_id = $_GET['id'];
    $sql = "SELECT * FROM Clients WHERE client_id = $client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
    } else {
        echo "Client not found.";
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
    <title>Edit Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Edit Client</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <!-- Client details fields -->
                        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
                        </div>
                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
