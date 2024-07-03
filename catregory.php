<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OUR SERVICES</title>
  <link rel="stylesheet" href="cat1.css">
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
          <a class="nav-link-custom" href="catregory.php" style="color: #0d6efd;">Category</a>
        </li>
            <li class="nav-item-custom">
          <a class="nav-link-custom" href="Request Service.php">Request Service</a>
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

<body>
  
<?php
// Create connection
$conn = new mysqli('localhost','root','','digital');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

// Fetch digital marketing plans
$digital_query = "SELECT * FROM services WHERE type = 'digital_marketing' LIMIT 3";
$digital_result = $conn->query($digital_query);

if ($digital_result->num_rows > 0) {
   echo '<h1 class="text-head2"><span>  </span> Digital Marketing Plan <span></span></h1>'; 
   echo '<main>'; 
    
   
    echo '<div class="plans">';
    while($row = $digital_result->fetch_assoc()) {
        echo '<section>';
        echo '<h2>' . $row["plan"] . '</h2>';
        echo '<h3 class="price">' . $row["price"] . ' EGP</h3>';
        echo '<hr>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<button class="button"> <a href="Request Service.php" style=" text-decoration: none
				; color: #fff; " >Request</a></button> ';
        echo '</section>';
    }
    echo '</div>';
    echo '</main>';
} else {
    echo "No digital marketing plans found.";
}

// Fetch web development plans
$web_query = "SELECT * FROM services WHERE type = 'web_development' LIMIT 3";
$web_result = $conn->query($web_query);

if ($web_result->num_rows > 0) {
   echo '<h1 class="text-head2"><span>  </span> Web Development Plan <span></span></h1>'; 
   echo '<main>';
    
    echo '<div class="plans">';
    while($row = $web_result->fetch_assoc()) {
        echo '<section>';
        echo '<h2>' . $row["plan"] . '</h2>';
        echo '<h3 class="price">' . $row["price"] . ' EGP</h3>';
        echo '<hr>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<button class="button"> <a href="Request Service.php" style=" text-decoration: none
				; color: #fff; " >Request</a></button> ';
        echo '</section>';
    }
    echo '</div>';
    echo '</main>';
} else {
    echo "No web development plans found.";
}

$conn->close();
?>
</body>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  const navbarToggler = document.getElementById('navbar-toggler-custom');
  const navbarCollapse = document.getElementById('navbarSupportedContentCustom');
  
  navbarToggler.addEventListener('click', function() {
    navbarCollapse.classList.toggle('show');
  });

  // Close the navbar when a link is clicked
  const navLinks = document.querySelectorAll('.nav-link-custom');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      navbarCollapse.classList.remove('show');
    });
  });
});

</script>

<footer class="custom-footer">
  <div class="custom-footer__addr">
    <img style="width: 60%;" src="Group 28.png" alt="">
    <p style="width: 40%; font-size: small;"  class="pr-5 text-muted">Unleash your business potential. We craft digital & web experiences that convert Your success is our focus We handle digital & web.</p>
    <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
    <h5 class="mt-lg-0 mt-sm-3"></h5>
    <p><i class="fa fa-phone mr-3"></i></p>
    <p><i class="fa fa-envelope-o mr-3"></i> </p>
    <p class="text-muted small"></p>
  </div>
  
  <div class="custom-footer__nav">
    <ul class="list-unstyled">
              <li><a href="Home.php">Home</a></li>
              <li><a href="catregory.php">Category</a></li>
              <li><a href="Request Service.php">Request Service</a></li>
              <li><a href="feedback.php">Feedback</a></li>
              <li><a href="About Us.php">About Us</a></li>
            </ul>
    <ul class="custom-nav__ul"> 
      <a href="#"> <h3 style="color: rgb(82, 82, 82);">Contact</h2></li>
      <p><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
      <p><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
 
    </ul>
  </div>
  
  <div class="custom-footer__nav">
    <p class="text-muted small">&copy; 2024. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="home.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
<style>
  
</style>