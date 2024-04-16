<?php
session_start();
include 'database_connection.php';
date_default_timezone_set('Asia/Singapore');
if (isset($_POST["submitForm"]) && $_POST["submitForm"] === "Send Message") {
    // Process the form submission
    $name = $_POST['name'];
    $email= $_POST['email'];
    $contact = $_POST['contact'];
    $ENmessage = $_POST['ENmessage'];
    $display = 'NO';
    
    $currentDateTime = date('Y-m-d H:i:s');
    
 
    // Insert the data into the database
    $sql = "INSERT INTO feedback (dateTime ,name, email, contact, ENmessage, display) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss",$currentDateTime, $name, $email, $contact, $ENmessage, $display);

    if ($stmt->execute()) {
        // Display alert message using JavaScript upon successful insertion
        echo '<script>alert("Feedback has been sent successfully");</script>';
         echo "<script>window.location.href='feedback.php';</script>";
          
        exit(); // Exit to prevent further execution
    } else {
        // Display alert message using JavaScript upon encountering an error
        echo '<script>alert("Failed to sent the feedback ");</script>';
         echo "<script>window.location.href='feedback.php';</script>";
            exit(); // Exit to prevent further execution
    }

    $stmt->close();
    
    $con->close();
}
?>

<style>
input.btn.btn-primary {
    background: #caa459;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;
}
input.btn.btn-primary:hover {
    background: #dca95b;
    border: 0;
    padding: 10px 24px;
    color: #fff;
    transition: 0.4s;
    border-radius: 4px;
}

</style>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Inspire Consultancy</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/inspire-logo.png" rel="icon">
        <link href="assets/img/inspire-logo.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">


    </head>

    <body>

         <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <a href="index.html"><img src="assets/img/inspire-logo.png" alt="" class="img-fluid"></a>
                </div>
                <div id="flexheader">
                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto" href="index.html">Home</a></li>
                            <li><a class="nav-link scrollto" href="about.html">About</a></li>
                            <li><a class="nav-link scrollto" href="index.html#services">Product</a></li>    
                            <li><a class="nav-link scrollto" href="index.html#featured">Services</a></li>    
                            <li><a class="nav-link scrollto" href="">Gallery</a></li>    
                            <li class="dropdown"><a href=""><span>Contact</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="index.html#faq">FAQ</a></li>
                                </ul>
                            </li>

                        </ul>

                        <i class="bi bi-list mobile-nav-toggle"></i>

                    </nav>
                    <a href="contact.html" class="get-started-btn scrollto">Enquiry</a>


                    <div class="dropdown">
                        <button class="dropbtn" onclick="toggleDropdown()"><i class="bi bi-globe-americas"></i></button>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="index.html">English</a>                           
                            <a href="CNindex.html">中文</a>
                            <!-- Add more language options as needed -->
                        </div>
                        <!-- Bilingual icon -->
                        <i class="icon fas fa-language"></i>
                    </div>                
                </div>
            </div>

        </header>

        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <section class="breadcrumbs">
                <div class="container">

                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Feedback</h2>
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li>Feedback</li>
                        </ol>
                    </div>

                </div>
            </section><!-- End Breadcrumbs -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact section-bg">
                <div class="container">

                    <div class="section-title">
                        <h2>LEAVE YOUR FEEDBACK HERE</h2>
                        <p>"Your feedback is invaluable in helping us provide better service. Thank you!"</p>
                    </div>

                    <div class="row" data-aos="fade-right" data-aos-delay="100">


                        <div class="col-lg-12">
                             <form  method="post" role="form" class="php-email-form" action="feedback.php">
                            
                                <div class="row">
                                    <div class="col form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="col form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required>

                                </div>
                               
                                <div class="form-group">
                                    <textarea class="form-control" name="ENmessage" maxlength="200" rows="5" placeholder="Feel Free To Leave Your Feedback Here ( 200 Character Limit )" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center">  <input type="submit" name="submitForm" class="btn btn-primary" value="Send Message"/></div>
                            </form>
                        </div>

                    </div>

                </div>





                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">

                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Inspire Consultancy<span></span></h3>
                            <p>
                                19-2, Plaza Danau 2, Jalan 109F,<br>
                                Taman Danau Desa, 58100 Kuala Lumpur,<br>
                                Wilayah Persekutuan Kuala Lumpur <br><br>
                                <strong>Phone:</strong> 03-79716815<br>
                                <strong>Email:</strong> weareinspireconsultancy@gmail.com<br>
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="product.html">Products</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="index.html#featured">Service</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="gallery.html">Gallery</a></li>                               

                            </ul>
                        </div>



                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Contact Us</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Enquiry</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="careers.html">Careers</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="feedback.html">Feedback</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="index.html#faq">F.A.Q</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <div class="container d-md-flex py-4">

                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Inspire Consultancy</span></strong>. All Rights Reserved
                    </div>

                </div>

            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

</html>