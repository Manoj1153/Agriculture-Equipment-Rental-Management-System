<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

// Escape special characters
$catid = mysqli_real_escape_string($con, $_POST['category']);
$subcatid = mysqli_real_escape_string($con, $_POST['subcategory']);
$proname = mysqli_real_escape_string($con, $_POST['proname']);
$modelnum = mysqli_real_escape_string($con, $_POST['modelnum']);
$rentprice = mysqli_real_escape_string($con, $_POST['renprice']);
$powersource = mysqli_real_escape_string($con, $_POST['powersource']);
$prodesc = mysqli_real_escape_string($con, $_POST['prodesc']);
$prospec = mysqli_real_escape_string($con, $_POST['prospec']);


//featured Image
$pic=$_FILES["image"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Product  Image 1
$pic1=$_FILES["image1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Product  Image 2
$pic2=$_FILES["image2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Product  Image 3
$pic3=$_FILES["image3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Product  Image 4
$pic4=$_FILES["image4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Product  Image 
$pic5=$_FILES["image5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Product image 1 has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Product image 2 has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Product image 3 has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Product image 4 has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Product image 5 has Invalid format. Only jpg / jpeg/ png /gif/ WebP format allowed');</script>";
}
else
{
// Images (use the same method to escape if necessary)
$propic = md5($pic) . time() . $extension;
$propic1 = md5($pic1) . time() . $extension1;
$propic2 = md5($pic2) . time() . $extension2;
$propic3 = md5($pic3) . time() . $extension3;
$propic4 = md5($pic4) . time() . $extension4;
$propic5 = md5($pic5) . time() . $extension5;
     move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$propic);
     move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$propic1);
     move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$propic2);
     move_uploaded_file($_FILES["image3"]["tmp_name"],"images/".$propic3);
     move_uploaded_file($_FILES["image4"]["tmp_name"],"images/".$propic4);
     move_uploaded_file($_FILES["image5"]["tmp_name"],"images/".$propic5);

     $query = $con->prepare("INSERT INTO tblproduct (CategoryID, SubcategoryID, ProductName, ModelNumber, RentPrice, PowerSource, ProductDescription, ProductSpecifications, Image, Image1, Image2, Image3, Image4, Image5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
     $query->bind_param("iissssssssssss", $catid, $subcatid, $proname, $modelnum, $rentprice, $powersource, $prodesc, $prospec, $propic, $propic1, $propic2, $propic3, $propic4, $propic5);
     
     // Execute the query
     if ($query->execute()) {
         echo '<script>alert("Product details have been added.")</script>';
         echo "<script>window.location.href = 'add-products.php'</script>";
     } else {
         echo '<script>alert("Something went wrong. Please try again.")</script>';
     }
     

  
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
    <!--//web-fonts-->
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
            <h2 class="main-title-w3layouts mb-2 text-center"> Add Product Details</h2>
            <!--// main-heading -->

            <!-- Forms content -->
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add Product Details</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Category</label>
                               <select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
                                    <option value=""> Choose Category</option>
                                    <?php $query1=mysqli_query($con,"select * from tblcategory");
while($row1=mysqli_fetch_array($query1))
{?>

<option value="<?php echo $row1['ID'];?>"><?php echo $row1['CategoryName'];?></option>
<?php } ?>

                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Subcategory</label>
                             <select   name="subcategory"  id="subcategory" class="form-control" required>
                               
                                       
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Name</label>
                                <input type="text" class="form-control" id="proname" name="proname" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Model Number</label>
                               <input type="text" class="form-control" id="modelnum" name="modelnum" required="true">
                            </div>
                        </div>
                     
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Rental Price/Day</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Power Source</label>
                               <input type="text" class="form-control" id="powersource" name="powersource" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" id="prodesc" name="prodesc" rows="3" required="true"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Specifications</label>
                                    <textarea class="form-control" id="prospec" name="prospec" rows="3" required="true"></textarea>
                                </div>
                                
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image1</label>
                                <input type="file" class="form-control" id="image1" name="image1" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image2</label>
                                <input type="file" class="form-control" id="image2" name="image2" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image3</label>
                                <input type="file" class="form-control" id="image3" name="image3" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image4</label>
                                <input type="file" class="form-control" id="image4" name="image4" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image5</label>
                                <input type="file" class="form-control" id="image5" name="image5" required="true">
                            </div>
                        </div>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Submit</button></p>
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