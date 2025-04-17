<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$proname=$_POST['proname'];
$modelnum=$_POST['modelnum'];
$rentprice=$_POST['renprice'];
$powersource=$_POST['powersource'];
$prodesc=$_POST['prodesc'];
$prospec=$_POST['prospec'];
$vid=$_GET['editid'];

 $query=mysqli_query($con,"update tblproduct set CategoryID='$catid',SubcategoryID='$subcatid',ProductName='$proname',ModelNumber='$modelnum',RentPrice='$rentprice',PowerSource='$powersource',ProductDescription='$prodesc',ProductSpecifications='$prospec' where ID='$vid'");

    if ($query) {
   
    echo '<script>alert("Product details has been updated.")</script>';
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  

}
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
    <script>
function getSubcat(val) {
    $.ajax({
        type: "POST",
        url: "get_subcat.php",
        data: {cat_id: val},
        success: function(data){
            $("#subcategory").html(data);
        }
    });
}
</script>
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
            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"> Update Products Details</h2>
            <!--// main-heading -->

            <!-- Forms content -->
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Update Products Details</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p style="font-size:16px; color:red" align="left"> 

  <?php
 $vid=$_GET['editid'];
$ret=mysqli_query($con,"select tblproduct.ID,tblproduct.CategoryID,tblproduct.SubcategoryID,tblproduct.ProductName,tblproduct.ModelNumber,tblproduct.PowerSource,tblproduct.RentPrice,tblproduct.ProductSpecifications, tblproduct.ProductDescription,tblproduct.Image,tblproduct.Image1,tblproduct.Image2,tblproduct.Image3,tblproduct.Image4,tblproduct.Image5,tblcategory.ID, tblcategory.CategoryName,tblsubcategory.CategoryID,tblsubcategory.SubcategoryName from  tblproduct join tblcategory on tblcategory.ID=tblproduct.CategoryID join tblsubcategory on tblsubcategory.ID = tblproduct.SubcategoryID where tblproduct.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Category</label>
                               <select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" >
                                    <option value="<?php echo $row['ID'];?>"> <?php echo $row['CategoryName'];?></option>
                                    <?php $query1=mysqli_query($con,"select * from tblcategory");
while($row1=mysqli_fetch_array($query1))
{?>

<option value="<?php echo $row1['ID'];?>"><?php echo $row1['CategoryName'];?></option>
<?php } ?>

                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Subcategory</label>
                             <select   name="subcategory"  id="subcategory" class="form-control" >
                               <option value="<?php echo $row['ID'];?>"> <?php echo $row['SubcategoryName'];?></option>
                                       
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Name</label>
                                <input type="text" class="form-control" id="proname" name="proname" value="<?php echo $row['ProductName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Model Number</label>
                               <input type="text" class="form-control" id="modelnum" name="modelnum" value="<?php echo $row['ModelNumber'];?>">
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Rental Price/Day</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" value="<?php echo $row['RentPrice'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Power Source</label>
                               <input type="text" class="form-control" id="powersource" name="powersource" value="<?php echo $row['PowerSource'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" id="prodesc" name="prodesc" rows="3"><?php echo $row['ProductDescription'];?></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Specifications</label>
                                    <textarea class="form-control" id="prospec" name="prospec" rows="3"><?php echo $row['ProductSpecifications'];?></textarea>
                                </div>
                      
                      
                        
                  
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image</label>
                                <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image1</label>
                                <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimage1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image2</label>
                                <img src="images/<?php echo $row['Image2'];?>" width="200" height="150" value="<?php  echo $row['Image2'];?>"><a href="changeimage2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image3</label>
                                <img src="images/<?php echo $row['Image3'];?>" width="200" height="150" value="<?php  echo $row['Image3'];?>"><a href="changeimage3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image4</label>
                                <img src="images/<?php echo $row['Image4'];?>" width="200" height="150" value="<?php  echo $row['Image4'];?>"><a href="changeimage4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image5</label>
                                <img src="images/<?php echo $row['Image5'];?>" width="200" height="150" value="<?php  echo $row['Image5'];?>"><a href="changeimage5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                        </div>
                        <?php } ?>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Update</button></p>
                    </form>
                </div>
                <!--// Forms-3 -->
                <!-- Forms-4 -->
               
            </section>

            <!--// Forms content -->

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

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

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