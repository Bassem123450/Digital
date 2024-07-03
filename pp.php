<?php
session_start(); // Start the session

if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $plan = $_POST['plan'];
    $description = $_POST['description'];

    $servername = "localhost";
    $username = "root";
    $password = ""; // Assuming no password
    $dbname = "digital";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve client ID from the session
    $client_id = $_SESSION['user_id']; // Assuming 'user_id' is the key storing the client ID in the session

    // Prepare and execute SQL query to get service_id based on type and plan
    $sql_select = "SELECT service_id FROM services WHERE type = ? AND plan = ?";
    $stmt_select = $conn->prepare($sql_select);
    $stmt_select->bind_param("ss", $type, $plan);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $service_id = $row['service_id'];

        // Prepare and execute SQL query to insert data into requests table
        $sql_insert = "INSERT INTO requests (client_id, service_id, date, description) VALUES (?, ?, NOW(), ?)";
        $stmt_insert = $conn->prepare($sql_insert);

        $stmt_insert->bind_param("iis", $client_id, $service_id, $description);
        if ($stmt_insert->execute()) {
            echo "Request submitted successfully!";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }

        $stmt_insert->close();
    } else {
        echo "No matching service found!";
    }

    $stmt_select->close();
    $conn->close();
} else {
    header("Location: request_service.html");
    exit();
}
?>
