<?php
include 'connection.php'; // Include the database connection file
session_start(); // Start the session

// Check if the user clicked the logout button
if(isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Navbar</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="home.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="feedback.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</header>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="Group 28.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item-active">
          <a class="nav-link "  href="Home.php"> <span class="homee">Home</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="catregory.php" >Category</a>
          </li>
            <li class="nav-item">
          <a class="nav-link" href="Request Service.php">Request Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #407BFF;"href="feedback.php">Feedback</a>
        </li>
      <li class="nav-item">
          <a class="nav-link" href="About Us.php">About Us</a>
        </li>
      </ul>
    </div>
    <!-- Logout button with custom styling -->
    <form action="" method="post">
      <button class="logout-btn" type="submit" name="logout">Log Out</button>
    </form>
  </div>
</nav>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="home.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="home.js"></script>