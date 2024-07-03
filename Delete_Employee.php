<?php
// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if employee ID is provided via GET request
if(isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Prepare and execute SQL query to delete employee from database
    $sql = "DELETE FROM Employees WHERE employee_id = $employee_id";

    if ($conn->query($sql) === TRUE) {
        // Employee deleted successfully, redirect to employees dashboard
        header("Location: employees_dash.php");
        exit();
    } else {
        // Error occurred while deleting employee
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Employee ID not provided.";
}

// Close database connection
$conn->close();
?>
