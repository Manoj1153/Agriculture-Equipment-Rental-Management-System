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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Category Wise Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    	
    		<div class="row">
  <?php
$cid = $_GET['catid'];

// Getting the current page number
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

// Formula for pagination
$no_of_records_per_page = 8;
$offset = ($pageno - 1) * $no_of_records_per_page;

// Getting the category name
$category_query = mysqli_query($con, "SELECT CategoryName FROM tblcategory WHERE ID='$cid'");
$category = mysqli_fetch_array($category_query)['CategoryName'];

// Getting the total number of pages
$total_pages_sql = "SELECT COUNT(*) FROM tblproduct WHERE CategoryID='$cid'";
$ret1 = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

// Fetching the products for the current page
$query = mysqli_query($con, "SELECT tblproduct.ID, tblproduct.CategoryID, tblproduct.SubcategoryID, tblproduct.ProductName, tblproduct.ModelNumber, tblproduct.PowerSource, tblproduct.RentPrice, tblproduct.ProductSpecifications, tblproduct.ProductDescription, tblproduct.Image, tblproduct.Image1, tblproduct.Image2, tblproduct.Image3, tblproduct.Image4, tblproduct.Image5, tblcategory.CategoryName, tblsubcategory.SubcategoryName FROM tblproduct JOIN tblcategory ON tblcategory.ID = tblproduct.CategoryID JOIN tblsubcategory ON tblsubcategory.ID = tblproduct.SubcategoryID WHERE tblproduct.CategoryID='$cid' LIMIT $offset, $no_of_records_per_page");
?>

<!-- Display Category Name -->
<h2 class="category-name"><?php echo $category; ?></h2>

<?php if(mysqli_num_rows($query) > 0) { ?>
    <div class="row">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
                <a href="single-product-details.php?viewid=<?php echo $row['ID']; ?>" class="img-prod">
                    <img class="img-fluid" src="admin/images/<?php echo $row['Image']; ?>" alt="Product Image">
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="single-product-details.php?viewid=<?php echo $row['ID']; ?>"><?php echo $row['ProductName']; ?></a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price"><span class="price-sale">Rs <?php echo $row['RentPrice']; ?>/day</span></p>
                        </div>
                    </div>
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-menu"></i></span>
                            </a>
                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                <span><i class="ion-ios-cart"></i></span>
                            </a>
                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                <span><i class="ion-ios-heart"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    } 
    ?>
    </div>
<?php } else { ?>
  <hr>
    <!-- No Products Available Message -->
 

                
             
              <div class="row mt-5">
          <div class="col text-center">
            <div class="page-pagi">
                         <p>No products available in this category.</p>
                    </div>
          </div>
        </div>
         
<?php } ?>
</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                         
                             <ul class="pagination" >
        <li class="page-item"><a class="page-link" href="?pageno=1"><strong>First</strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev</strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next</strong></a>
        </li>
        <li class="page-item"><a class="page-link"  href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
                        </nav>
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
</html>