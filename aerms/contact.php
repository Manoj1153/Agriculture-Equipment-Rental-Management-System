<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>AgriRentals Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="images/logo.png" type="image/x-icon" sizes="32x32">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .contact-section {
            padding: 50px 0;
        }
        .contact-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }
        .info-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }
        .info-box:hover {
            transform: translateY(-5px);
        }
        .info-box i {
            font-size: 30px;
            color: #82ae46;
            margin-bottom: 10px;
        }
        .social-icons a {
            margin: 0 10px;
            font-size: 20px;
            color: #82ae46;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #155724;
        }
    </style>
</head>
<body>
    <?php include_once('includes/header.php'); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 text-center">
                    <p class="breadcrumbs"><span><a href="index.php">Home</a></span> <span>Contact Us</span></p>
                    <h1 class="mb-0 bread">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section bg-light">
        <div class="container">
            <div class="row contact-info">
                <?php 
                $query=mysqli_query($con,"select * from tblpage where PageType='contactus'");
                while ($row=mysqli_fetch_array($query)) { ?>
                    <div class="col-md-3 info-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><?php echo $row['PageDescription']; ?></p>
                    </div>
                    <div class="col-md-3 info-box">
                        <i class="fas fa-phone"></i>
                        <p><a href="tel:+919381472305">+91 9381472305</a></p>
                    </div>
                    <div class="col-md-3 info-box">
                        <i class="fas fa-envelope"></i>
                        <p><a href="mailto:<?php echo $row['Email']; ?>"> <?php echo $row['Email']; ?></a></p>
                    </div>
                    <div class="col-md-3 info-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30442.2851219866!2d78.38557588609645!3d17.493872932940338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91eb39b83caf%3A0xcec81ed8b378ca4e!2s207%2C%20Alluri%20Residential%20Complex%2C%20Number%201%20A%20St%2C%20Bhagya%20Nagar%20Colony%2C%20Venkat%20Nagar%20Colony%2C%20Hyderabad%2C%20Telangana%20500072!5e0!3m2!1sen!2sin!4v1628533202996!5m2!1sen!2sin" width="100%" height="150" style="border:none;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                <?php } ?>
            </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
        $(document).ready(function () {
            $('.info-box').hover(function () {
                $(this).addClass('shadow-lg');
            }, function () {
                $(this).removeClass('shadow-lg');
            });
        });
    </script>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { 
                pageLanguage: 'en', 
                includedLanguages: 'en,hi,te,ta,kn,ml,mr,bn,or,pa,ur', 
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE 
            }, 
            'google_translate_element'
        );
    }

    // Trigger translation when language is selected
    function changeLanguage(lang) {
        var selectField = document.querySelector(".goog-te-combo");
        if (selectField) {
            selectField.value = lang;
            selectField.dispatchEvent(new Event('change'));
        }
    }
</script>

<script type="text/javascript" 
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
</body>
</html>
