<?php
// Initialize variables to store form data and error message
$type = $plan = $description = $price = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $service_id = $_POST['service_id'];
    $type = $_POST['type'];
    $plan = $_POST['plan'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'digital');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to update service details in the database
    $sql = "UPDATE Services SET type = '$type', plan = '$plan', description = '$description', price = '$price' WHERE service_id = $service_id";

    if ($conn->query($sql) === TRUE) {
        // Service details updated successfully, redirect to service dashboard
        header("Location: services_dash.php");
        exit();
    } else {
        // Error occurred while updating service details
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // Fetch service details from the database
    if(isset($_GET['id'])) {
        $service_id = $_GET['id'];
        
        // Establish database connection
        $conn = new mysqli('localhost', 'root', '', 'digital');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch service details based on service_id
        $sql = "SELECT * FROM Services WHERE service_id = $service_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $type = $row['type'];
            $plan = $row['plan'];
            $description = $row['description'];
            $price = $row['price'];
        } else {
            echo "Service not found.";
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
    <title>Update Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgb(255 255 255 / 83%), #ffffffe8), url(CC-Routes-1.jpg);
            background-size: cover;
            height: 100vh;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-bottom: none;
            border-radius: 12px 12px 0 0;
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

        textarea.form-control {
            height: 100px;
        }

        #price {
            outline: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Update Service</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>">
                        </div>
                        <div class="form-group">
                            <label for="plan">Plan:</label>
                            <input type="text" class="form-control" id="plan" name="plan" value="<?php echo $plan; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
