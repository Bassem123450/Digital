<?php
include 'nav.php'; // Include the navigation bar file
include 'connection.php'; // Include the database connection file

// Start the session

// Check if the form is submitted
if(isset($_POST['submit_feedback'])) {
    // Retrieve form data
    $feedback_text = $_POST['message'];
    $client_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; // Get the client ID from the session

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (client_id, feedback_Text) VALUES ('$client_id', '$feedback_text')";
    if ($conn->query($sql) === TRUE) {
        // Feedback submitted successfully, display SweetAlert
        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>'; // Include SweetAlert library
        echo '<script>';
        echo 'swal("Success!", "Thank you! We received your feedback.", "success").then(function() { window.location = "feedback.php"; });';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if the query fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Form</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
<head>
    <!-- Other meta tags and stylesheets -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

</head>
<body>
<div class="custom-container">
    <div class="custom-row">
        <div class="custom-col-left">
            <h4 class="custom-heading">Get in touch</h4>
            <!-- Feedback form -->
            <form method="post" id="feedback-form">
                <label for="message" class="custom-label">Your Message</label>
                <textarea class="custom-textarea" id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>
                <button type="submit" class="custom-button" name="submit_feedback">Submit</button>
            </form>
        </div>
        <div class="custom-col-right custom-contact-info">
            <h4>Contact us</h4>
            <div class="custom-decorative-line"></div>
            <!-- Contact information -->
            <p><span class="custom-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="50" viewBox="0,0,256,256"
                style="fill:#000000;">
                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M24.96289,1.05469c-0.20987,0.00724 -0.41214,0.08036 -0.57812,0.20898l-23,17.94727c-0.43579,0.33978 -0.51361,0.96851 -0.17383,1.4043c0.33978,0.43579 0.96851,0.51361 1.4043,0.17383l1.38477,-1.08008v26.29102c0.00006,0.55226 0.44774,0.99994 1,1h13.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h13.8418c0.55226,-0.00006 0.99994,-0.44774 1,-1v-26.29102l1.38477,1.08008c0.2819,0.21983 0.65967,0.27257 0.991,0.13833c0.33133,-0.13423 0.56586,-0.43504 0.61526,-0.7891c0.0494,-0.35406 -0.09386,-0.70757 -0.37579,-0.92736l-7.61523,-5.94141v-7.26953h-6v2.58594l-9.38477,-7.32227c-0.18607,-0.14428 -0.41707,-0.21828 -0.65234,-0.20898zM25,3.32227l19,14.82617v26.85156h-12v-19h-14v19h-12v-26.85156zM37,8h2v3.70898l-2,-1.5625zM20,28h10v17h-10z"></path></g></g>
                </svg> </span> Address: Online</p>
            <p><span class="custom-icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAABFUlEQVR4nLXUvy4EURTH8d2ERkMidJLNRkEkBAXRoBXVZkVLRcdziHgEtHgBfwqy5ZKteJ6PXDmRm5HI7Aynuudk7vf+5vxrNP7TsIMe9v8Cdop7tPCKdh3YIW4wEv46ntCsCuxhohA7x3FV4DWWC7ExvFcF7uKsEGvjpSpwFANMZrE7bFYCJsMeLuPcRB+LjTqGW3TiPBvtM1MHOI43LIS/Gkqn6kDnI59fyrAd0FpK1+J3pzOlyV/CVvTtB45KN39c/M5h5LQf1W9Hn17gMY3rMEoHWU5/qMFG5L3cQsFcKO388k0Lz6WAWfVTS13lzZ8NxUNafaWB2eVupCAtjpW0UOKhk6FhBUVp9pPaVO2DyrAy9gl742bKY1zLsgAAAABJRU5ErkJggg=="> </span> Contact: 8888888888</p>
            <p><span class="custom-icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA4klEQVR4nN3UIUtEQRDA8Vcsdr1gV8wiVjEY1GITuauvGO59AJPRcAaLZqMYrCYRQcHTdB9Aox/B9JOVefCUE+7dexYXltmZnfnP7C47WfZXAx30kNecvRQ7DvaM/hTAAi+YrwJTln6D0xXoVg1f2WK9igF2agDzMn4ccIRNPGChDeAVLvGI2TaAXRzjAEuVy09VL2IfG5iZFPgW+h3OcBH6B67jAU5wj7lJgMOQ5wEs7bvYw1ro28knawBM1R3iBlthe2oCHIVcx+kP33waYGlfqRx1+D+A78kx5BFeQ7+N/eWqT/YLMDWHImuxOXSiBaWN5u2rAk3fri4wxXyHtTk+Aaou89JNt9Z7AAAAAElFTkSuQmCC"></span> Email: contact@gmail.com</p>
            <p><span class="custom-icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="50" viewBox="0,0,256,256"
                style="fill:#000000;">
                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M24.96289,1.05469c-0.20987,0.00724 -0.41214,0.08036 -0.57812,0.20898l-23,17.94727c-0.43579,0.33978 -0.51361,0.96851 -0.17383,1.4043c0.33978,0.43579 0.96851,0.51361 1.4043,0.17383l1.38477,-1.08008v26.29102c0.00006,0.55226 0.44774,0.99994 1,1h13.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h13.8418c0.55226,-0.00006 0.99994,-0.44774 1,-1v-26.29102l1.38477,1.08008c0.2819,0.21983 0.65967,0.27257 0.991,0.13833c0.33133,-0.13423 0.56586,-0.43504 0.61526,-0.7891c0.0494,-0.35406 -0.09386,-0.70757 -0.37579,-0.92736l-7.61523,-5.94141v-7.26953h-6v2.58594l-9.38477,-7.32227c-0.18607,-0.14428 -0.41707,-0.21828 -0.65234,-0.20898zM25,3.32227l19,14.82617v26.85156h-12v-19h-14v19h-12v-26.85156zM37,8h2v3.70898l-2,-1.5625zM20,28h10v17h-10z"></path></g></g>
                </svg></span> Facebook: facebook.com/contact</p>
            <p><span class="custom-icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA4klEQVR4nN3UIUtEQRDA8Vcsdr1gV8wiVjEY1GITuauvGO59AJPRcAaLZqMYrCYRQcHTdB9Aox/B9JOVefCUE+7dexYXltmZnfnP7C47WfZXAx30kNecvRQ7DvaM/hTAAi+YrwJTln6D0xXoVg1f2WK9igF2agDzMn4ccIRNPGChDeAVLvGI2TaAXRzjAEuVy09VL2IfG5iZFPgW+h3OcBH6B67jAU5wj7lJgMOQ5wEs7bvYw1ro28knawBM1R3iBlthe2oCHIVcx+kP33waYGlfqRx1+D+A78kx5BFeQ7+N/eWqT/YLMDWHImuxOXSiBaWN5u2rAk3fri4wxXyHtTk+Aaou89JNt9Z7AAAAAElFTkSuQmCC"></span> LinkedIn: linkedin.com/company/contact</p>
        </div>
    </div>
</div>

<div class="mt-5 pt-5 pb-5 new-footer">
    <div class="custom-container1">
        <div class="new-row">
            <div class="col-lg-5 col-xs-12">
                <img style="width: 40%;" src="Group 28.png" alt="">
                <p class="pr-5 text-muted" style="width: 40%;">Unleash your business potential. We craft digital & web experiences that convert Your success is our focus We handle digital & web. </p>
                <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
            </div>
            <div class="col-lg-3 col-xs-12">
                <h5 class="mt-lg-0 mt-sm-3"> Quick Links</h5>
                <ul class="list-unstyled " style="color: black;">
                    <li style="color: black;">Home</a></li>
                    <li>Category</a></li>
                    <li>About Us</a></li>
                    <li>Feedback</a></li>
                    <li>Request Service</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-xs-12">
                <h5 class="mt-lg-0 mt-sm-3"> Contact Us</h5>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>