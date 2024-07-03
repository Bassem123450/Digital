<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if admin ID is provided via GET request
if(isset($_GET['id'])) {
    $admin_id = $_GET['id'];

    // Prepare and execute SQL query to delete admin from database
    $sql = "DELETE FROM Admins WHERE admin_id = $admin_id";

    if ($conn->query($sql) === TRUE) {
        // Admin deleted successfully, redirect to admins dashboard
        header("Location:Admin_Dash.php");
        exit();
    } else {
        // Error occurred while deleting admin
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Admin ID not provided.";
}

// Close database connection
$conn->close();
?>
