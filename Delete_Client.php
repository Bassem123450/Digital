<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if client ID is provided via GET request
if(isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Prepare and execute SQL query to delete client from database
    $sql = "DELETE FROM Clients WHERE client_id = $client_id";

    if ($conn->query($sql) === TRUE) {
        // Client deleted successfully, redirect to clients dashboard
        header("Location: Dashboard.php");
        exit();
    } else {
        // Error occurred while deleting client
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Client ID not provided.";
}

// Close database connection
$conn->close();
?>
