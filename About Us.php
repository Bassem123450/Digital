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
<title>About Us</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="About%20Us.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
   </head>

    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="Home.php"><img src="Group 28.png" alt="Logo"></a>
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
          <a class="nav-link" href="feedback.php">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About Us.php" style="color: #407BFF;">About Us</a>
        </li>
      </ul>
    </div>
	<form action="" method="post">
      <button class="logout-btn" type="submit" name="logout">Log Out</button>
    </form>
  </div><!-- Log Out button with custom styling -->
  </div>
</nav>

  <div></div>
    <section class="hero"> 
        
        <div class="container">
            <div class="hero-content">
                <h2 style="color: rgb(49, 49, 49);">Digital Crafters</span></h2> 
                <p style="color: rgb(148, 148, 148)
				;"> Digital Crafters is a modern technology and web solutions developer and provider. We are a company born in the Cloud and inspired by today’s modern technologies that solve problems and make the world a better place. Code Clouders specializes in web solutions, mobile applications, software development, Cloud technologies, IoT, Machine Learning, and User Experience design and consulting.

					</p>
               
            </div>
            <div class="hero-image">
                <img src="Team work-amico.png">
              
            </div>  
        </div>
     </section>
        
        
        
      <div class="row">
          <div class="column">
          <div class="card">
            <div class="icon">
                <img src="icons8-vision-30.png">
            </div>
            <h3>Our Vision</h3>
            <p>
             To become a trusted market leader in the region for developing and deploying innovative and user-friendly products and solutions using advanced and modern web, mobile, and cloud technologies.
            </p>
          </div>
        </div>
          
        <div class="column">
          <div class="card">
            <div class="icon">
             <img src="icons8-mission-50.png">
            </div>
            <h3>Our Mission</h3>
            <p>
            To leverage our technology-driven, customer-focused approach to build extraordinary digital products, services, and solutions that can transform our customers’ businesses and help them become more successful.
            </p>
          </div>
        </div>
    </div>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        .team-section {
            text-align: center;
            padding: 50px 0;
        }

        .team-heading h1 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
            text-transform: uppercase;
        }

        .team-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }

        .team-member {
            width: calc(33.33% - 20px);
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .team-member:nth-child(3n + 1) {
            margin-right: 0;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .member-card {
            padding: 20px;
        }

        .member-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .member-card h3 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }
		@media only screen and (max-width: 768px) {
    .team-content {
        display: block;
    }

    .team-member {
        width: 100%;
        margin-bottom: 20px;
    }
}

        .member-card h5 {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }

        .icons {
            margin-top: 20px;
        }

        .icons a {
            margin: 0 5px;
            color: #333;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s ease-in-out;
        }

        .icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <section class="team-section">
        <div class="team-heading">
            <h1><span></span> Our Team <span></span></h1>
        </div>

        <div class="team-content">
            <!-- Top row -->
            <div class="team-member">
                <div class="member-card">
                    <img src="01.png" alt="Bassem Ahmed">
                    <h3>Bassem Ahmed</h3>
                    <h5>Front-End Developer</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-card">
                    <img src="01.png" alt="Karim Ahmed">
                    <h3>Karim Ahmed</h3>
                    <h5>Back-End Developer</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-card">
                    <img src="04.png" alt="Lydia Ossama">
                    <h3>Lydia Ossama</h3>
                    <h5>Video Editor</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>

            <!-- Bottom row -->
            <div class="team-member">
                <div class="member-card">
                    <img src="04.png" alt="Lydia Bassem">
                    <h3>Lydia Bassem</h3>
                    <h5>Social Media Marketing Manager</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-card">
                    <img src="01.png" alt="Mohamed Sherif">
                    <h3>Mohamed Sherif</h3>
                    <h5>UX/UI Designer</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-member">
                <div class="member-card">
                    <img src="01.png" alt="Mohamed Hesham">
                    <h3>Mohamed Hesham</h3>
                    <h5>Content Creator</h5>
                    <div class="icons">
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-box-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

    
   
	<section class="hero"> 
        <div class="heading"> <h1>Take The Next Step</h1> </div> 
        <div class="container">
            <div class="hero-content">
                <h2>Welcome To Our World</h2> 
                <p>Discover the latest trends and innovations in technology, design, and more. Our team of experts brings you the best content and insights to help you stay ahead of the curve</p>
                <button class="button"> <a href="Request Service.php" style=" text-decoration: none
				; color: #fff; " >Start Now</a></button> 
            </div>
            <div class="hero-image">
                <img src="Online world-amico.png">
              
            </div>  
        </div>
     </section>
    
    
    
	 <div class="mt-5 pt-5 pb-5 new-footer">
		<div class="custom-container">
		  <div class="new-row">
			<div class="col-lg-5 col-xs-12">
			 <img style="width: 40%; padding-left: 50px;"  src="Group 28.png" alt="">
			  <p class="pr-5 text-muted" style="width: 
			  80%;";">Unleash your business potential. We craft digital & web experiences that convert Your success is our focus We handle digital & web.</p>
			  <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
			</div>
			<div class="col-lg-3 col-xs-12" style="text-decoration: none;" >
			  <h5 class="mt-lg-0 mt-sm-3"> Quick Links</h4>
			  <ul class="list-unstyled " style="color: black;">
				<li style="color: black;" ><a href="Home.php">Home</a></li>
				<li><a href="catregory.php">Category</a></li>
				<li><a href="Request Service.php">Request Service</a></li>
				<li><a href="feedback.php">Feedback</a></li>
				<li><a href="About Us.php">About Us</a></li>
			  </ul>
			</div>
			<div class="col-lg-4 col-xs-12">
			  <h5 class="mt-lg-0 mt-sm-3"> Contact Us</h4>
			  <p><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
			  <p><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
			</div>
		  </div>
		  <div class="new-row mt-5">
			<div class="col">
			  <p class="text-muted small">&copy; 2024. All Rights Reserved.</p>
			</div>
		  </div>
		</div>
	  </div>
	  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

	  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
    