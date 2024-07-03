<?php
// Check if service ID is provided via GET request
if(isset($_GET['id'])) {
    $service_id = $_GET['id'];

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'digital');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to delete service from database
    $sql = "DELETE FROM Services WHERE service_id = $service_id";

    if ($conn->query($sql) === TRUE) {
        // Service deleted successfully, redirect back to services dashboard
        header("Location:services_dash.php");
        exit();
    } else {
        // Error occurred while deleting service
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    echo "Service ID not provided.";
}
?>
