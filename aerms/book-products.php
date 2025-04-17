<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
$uid=$_SESSION['uid'];
$pid=$_GET['bookid'];
    $fromdate=$_POST['fromdate'];
    $todate=$_POST['todate'];
    $usedfor=$_POST['usedfor'];
    $quantity=$_POST['quantity'];
    $deladdress=$_POST['deladdress'];
    $booknumber = mt_rand(100000000, 999999999);
    
   $addproof=$_FILES["image"]["name"];
     $extension = substr($addproof,strlen($addproof)-4,strlen($addproof));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$addproof=md5($addproof).$extension;
     move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$addproof);



     $ret=mysqli_query($con,"SELECT * FROM tblbooking where ('$fromdate' BETWEEN date(FromDate) and date(ToDate) || '$todate' BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN '$fromdate' and '$todate') and ProductID='$pid'");
     $count=mysqli_num_rows($ret);

  if($count==0){
    $query=mysqli_query($con,"insert into tblbooking(BookingNumber,UserID,ProductID,FromDate,ToDate,UsedFor,Quantity,DeliveryAddress,AddressProof) value('$booknumber','$uid','$pid','$fromdate','$todate','$usedfor','$quantity','$deladdress','$addproof')");
    if ($query) {
        echo "<script>alert('Your product has been booked.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    } }else{
        echo "<script>alert('Equipment not available for these days');</script>"; 
    }

  
}
}

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
  </head>
  <body class="goto-here">

<?php include_once('includes/header.php');?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Book Your Product</span></p>
            <h1 class="mb-0 bread">Book Your Product</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
   
        <div class="row block-9">
          
          <div class="col-md-12 order-md-last d-flex">

            <form class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data"> 
            
              <div class="form-group">
                 <label class="" style="font-weight: bolder;">From Date <span>*</span></label>
                 <input type="date" name="fromdate" required="true" class="form-control">
              </div>
              <div class="form-group">
                  <label class="" style="font-weight: bolder;">To Date <span>*</span></label>
                  <input type="date" name="todate" required="true" class="form-control">
              </div>
              <div class="form-group">
               <label class="" style="font-weight: bolder;">Used For <span>*</span></label>
                <select name="usedfor" required="true" class="form-control">
                    <option value="">Select</option>
                    <option value="Individual">Individual</option>
                    <option value="Corporate">Corporate</option>
                </select>
              </div>
              <div class="form-group">
                <label class="" style="font-weight: bolder;">Quantity <span>*</span></label>
                <input type="text" name="quantity" required="true" class="form-control">
              </div>
              <div class="form-group">
                <label class="" style="font-weight: bolder;">Delivery Address <span>*</span></label>
                <textarea name="deladdress" required="true"  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label class="" style="font-weight: bolder;">Delivery Address Proof <span>*</span></label>
                <input type="file" name="image" required="true" class="form-control">
              </div>   
              <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          
        </div>
      </div>
    </section>

    <?php include_once('includes/footer.php');?>

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
    
  </body>
</html><?php }  ?>