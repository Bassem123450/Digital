<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OUR SERVICES</title>
  <link rel="stylesheet" href="cat.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  
</head>

<nav class="navbar-custom">
  <div class="container-custom">
    <a class="navbar-brand-custom" href="#"><img src="Group 28.png" alt=""></a>
    <button class="navbar-toggler-custom" id="navbar-toggler-custom" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse-custom" id="navbarSupportedContentCustom">
      <ul class="navbar-nav-custom">
        <li class="nav-item-custom">
          <a class="nav-link-custom" href="Home.php"><span class="homee">Home</span></a>
        </li>
        <li class="nav-item-custom">
          <a class="nav-link-custom" href="catregory.php" >Category</a>
        </li>
              <li class="nav-item-custom">
          <a class="nav-link-custom" href="Request Service.php"  style="color: #0d6efd;">Request Service</a>
        </li>
        <li class="nav-item-custom">
          <a class="nav-link-custom" href="feedback.php">Feedback</a>
        </li>
       <li class="nav-item-custom">
          <a class="nav-link-custom" href="About Us.php">About Us</a>
        </li>
      </ul>
    </div>
    <?php
    // Check if the user is logged in
    if(isset($_SESSION['user_id'])) {
        echo '<a class="logout-btn-custom" style="text-decoration: none;" href="login.php">Log Out</a>';
    } else {
        echo '<a class="logout-btn-custom" style="text-decoration: none;" href="login.php">Log out</a>';
    }
    ?>
  </div>
</nav>