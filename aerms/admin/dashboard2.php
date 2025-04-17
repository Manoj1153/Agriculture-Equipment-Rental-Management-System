<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AgriRentals Hub</title>

   
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link rel="icon" href="images/logo.png" type="image/x-icon" sizes="32x32">
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
   <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Search Booking</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
      
                    <div class="container-fluid">
                        <div class="row">
                    <!-- Stats -->

                    <div class="outer-w3-agile col-xl">
                        <h5 style="padding-bottom: 10px">Dashboard</h5>
                        <div class="stat-grid p-3 d-flex 
                        align-items-center justify-content-between bg-primary">
                        <?php $query1=mysqli_query($con,"Select * from tblproduct");
$totalpro=mysqli_num_rows($query1);
?>
                            <div class="s-l">
                                <h5>Total Product</h5>
                                <a class="text-muted text-uppercase m-b-20" href="manage-products.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totalpro;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-success">
                            <?php $query2=mysqli_query($con,"Select * from tblbooking where Status is null");
$newbooking=mysqli_num_rows($query2);
?>
                            <div class="s-l">
                                <h5>New Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="new-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $newbooking;?>
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
                            <?php $query3=mysqli_query($con,"Select * from tblbooking where Status='Approved'");
$apprbooking=mysqli_num_rows($query3);
?>
                            <div class="s-l">
                                <h5>Approved Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="approved-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $apprbooking;?>
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>

                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                            <?php $query4=mysqli_query($con,"Select * from tblbooking where Status='Unapproved'");
$unapprbooking=mysqli_num_rows($query4);
?>
                            <div class="s-l">
                                <h5>Unapproved Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="unapproved-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $unapprbooking;?>
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
<div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-primary">
                        <?php $query5=mysqli_query($con,"Select * from tblbooking");
$totalbooking=mysqli_num_rows($query5);
?>
                            <div class="s-l">
                                <h5>Total Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="all-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>

                            <div class="s-r">
                                <h6><?php echo $totalbooking;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-success">
                            <?php $query2=mysqli_query($con,"Select * from tblbrand");
$totbrand=mysqli_num_rows($query2);
?>
                            <div class="s-l">
                                <h5>Total Brand</h5>
                                <a class="text-muted text-uppercase m-b-20" href="manage-brand.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totbrand;?>
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <!--// Stats -->
                
                </div>
                    </div>
                </div>
                <!--// table6 -->

        

            </section>

            <!--// Tables content -->

           <?php include_once('includes/footer.php');?>
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
<?php }  ?>