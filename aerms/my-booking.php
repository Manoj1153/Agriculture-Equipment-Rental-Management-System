<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{




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
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
  </head>
  <body class="goto-here">

<?php include_once('includes/header.php');?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>My Booking</span></p>
            <h1 class="mb-0 bread">My Booking</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
               <h2>My Booking</h2>
              <table class="table">
                <thead class="thead-primary">
                 <tr>
<th>#</th>
<th>Booked By</th>
<th>Booking Number</th>
<th>Product Name</th>  
<th>Booking Date</th>
<th>Booking Status</th>
<th>View Details</th>
</tr>
                </thead>
                <tbody>
            <?php 
                    $userid= $_SESSION['uid'];
 $query=mysqli_query($con,"select tblbooking.ID as bid,tblbooking.UserID,tblbooking.ProductID,tblbooking.BookingNumber,tblbooking.FromDate,tblbooking.ToDate,tblbooking.UsedFor,tblbooking.Quantity,tblbooking.DeliveryAddress,tblbooking.AddressProof,tblbooking.DateofBooking,tblbooking.Status,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblproduct.ProductName from  tblbooking join  tbluser on tbluser.ID=tblbooking.UserID join tblproduct on tblproduct.ID=tblbooking.ProductID  where tblbooking.UserID='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>

<tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></td>
<td><?php echo $row['BookingNumber']?></td>
<td><?php echo $row['ProductName']?></td>
<td><?php echo $row['DateofBooking']?></td>
<td><?php $status=$row['Status'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

?>  
<td><a href="booking-detail.php?bookingid=<?php echo $row['BookingNumber'];?>" class="btn theme-btn-dash">View Details</a></td>       
</tr>
<?php $cnt=$cnt+1; } ?>

                
                </tbody>
              </table>
            </div>
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