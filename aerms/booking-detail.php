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
    <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');

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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Book Your Product</span></p>
            <h1 class="mb-0 bread">Book Your Product</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
             <b>#<?php echo $bid = $_GET['bookingid']; ?> Booking Details</b>
<div class="row">
    <div class="col-lg-12">
        <?php
        // Getting URL
        $link = "http"; 
        $link .= "://"; 
        $link .= $_SERVER['HTTP_HOST']; 

        // Getting order details
        $userid = $_SESSION['uid'];
        $ret = mysqli_query($con, "SELECT DateofBooking, Status FROM tblbooking WHERE UserID='$userid' AND BookingNumber='$bid'");
        while ($result = mysqli_fetch_array($ret)) {
        ?>

        <p style="color:#000"><b>Booking #</b><?php echo $bid; ?></p>
        <p style="color:#000"><b>Booking Date: </b><?php echo $od = $result['DateofBooking']; ?></p>
        <p style="color:#000"><b>Booking Status:</b> 
            <?php echo empty($result['Status']) ? "Not Responded Yet" : $result['Status']; ?> &nbsp;
        </p>

        <?php } ?>
        
        <!-- Invoice -->
        <p>
            <a href="javascript:void(0);" onClick="popUpWindow('invoice.php?invid=<?php echo $bid; ?>');" title="Booking Invoice" style="color:#000">  
            <strong style="color:red">Invoice</strong></a>
        </p>
        
        <div class="cart-list">
            <h2>My Booking</h2>
            <?php 
            $query = mysqli_query($con, "SELECT tblbooking.ID as bid, DATEDIFF(tblbooking.ToDate, tblbooking.FromDate) as ddf, tblbooking.UserID, tblbooking.ProductID, tblbooking.BookingNumber, tblbooking.FromDate, tblbooking.ToDate, tblbooking.UsedFor, tblbooking.Quantity, tblbooking.DeliveryAddress, tblbooking.AddressProof, tblbooking.DateofBooking, tblbooking.Status, tblbooking.TotalCost, tblbooking.Remark, tblbooking.RemarkDate, tbluser.FirstName, tbluser.LastName, tbluser.Email, tbluser.MobileNumber, tblproduct.ProductName, tblproduct.Image, tblproduct.RentPrice, tblproduct.ModelNumber, tblproduct.ProductDescription,tblproduct.ProductSpecifications FROM tblbooking JOIN tbluser ON tbluser.ID = tblbooking.UserID JOIN tblproduct ON tblproduct.ID = tblbooking.ProductID WHERE tblbooking.UserID = '$userid' AND tblbooking.BookingNumber = '$bid'");
            
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                $cnt = 1;
            ?>
            <table class="table">
                <thead class="thead-primary">
                    <tr>
                        <th>#</th>
                        <th>Booking Number</th>
                        <th>Booking Date</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Product Image</th>  
                        <th>Product Name</th> 
                        <th>Quantity</th>    
                        <th>Rental Price</th>   
                        <th>Total Price (Excl. GST)</th>  
                        <th>GST (18%)</th>
                        <th>Total Price (Incl. GST)</th>
                    </tr>
                </thead>
                <tbody>
                <?php   
                while ($row = mysqli_fetch_array($query)) {
                    $qty = $row['Quantity']; 
                    $rentPrice = $row['RentPrice']; 
                    $days = $row['ddf']; 
                    $totalWithoutGST = $days * $rentPrice * $qty; // Calculate total without GST
                    $gst = $totalWithoutGST * 0.18; // 18% GST
                    $totalWithGST = $totalWithoutGST + $gst; // Total including GST
                ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['BookingNumber']; ?></td>
                        <td><?php echo $row['DateofBooking']; ?></td>
                        <td><?php echo $row['FromDate']; ?></td>
                        <td><?php echo $row['ToDate']; ?></td>
                        <td><img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row['Image']; ?>" alt="<?php echo $row['Image']; ?>" width="300" height="250"></td>
                        <td><?php echo $row['ProductName']; ?></td> 
                        <td><?php echo $qty; ?></td> 
                        <td>Rs. <?php echo $rentPrice; ?></td> 
                        <td>Rs. <?php echo $totalWithoutGST; ?></td>
                        <td>Rs. <?php echo number_format($gst, 2); ?></td>
                        <td>Rs. <?php echo number_format($totalWithGST, 2); ?></td>
                    </tr>
                <?php 
                    $cnt++; 
                } 
                ?>
                </tbody>
            </table>
            <?php } else { ?>
                <!-- No Products Available Message -->
                <p>No products found for this booking.</p>
            <?php } ?>
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
