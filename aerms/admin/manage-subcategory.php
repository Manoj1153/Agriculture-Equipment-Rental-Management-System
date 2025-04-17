<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{



if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblsubcategory where ID='$rid'");
if($query){

echo "<script>alert('sub-Category  details deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-subcategory.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
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
            <h2 class="main-title-w3layouts mb-2 text-center">Manage Sub-Category</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Manage Sub-Category</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;
$offset = ($page - 1) * $records_per_page;

$query = "SELECT tblcategory.ID, tblcategory.CategoryName, tblsubcategory.ID as sid, tblsubcategory.CategoryID, tblsubcategory.SubcategoryName, tblsubcategory.CreationDate FROM tblsubcategory JOIN tblcategory ON tblsubcategory.CategoryID = tblcategory.ID LIMIT $records_per_page OFFSET $offset";
$ret = mysqli_query($con, $query);
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">S.NO</th>
            <th scope="col">Category Name</th>
            <th scope="col">Sub-Category Name</th>
            <th>Creation Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php
    $cnt = $offset + 1;
    while ($row = mysqli_fetch_array($ret)) {
    ?>
    <tbody>
        <tr data-expanded="true">
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row['CategoryName']; ?></td>
            <td><?php echo $row['SubcategoryName']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            <td><a class="btn btn-sm btn-primary" href="edit-subcategory.php?editid=<?php echo $row['sid']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="manage-subcategory.php?delid=<?php echo $row['sid']; ?>" onclick="return confirm('Do you really want to Delete ?');">Delete</a>
            </td>
        </tr>
    </tbody>
    <?php 
        $cnt++;
    } 
    ?>
</table>

<?php
$total_query = "SELECT COUNT(*) as total FROM tblsubcategory";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_array($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

echo '<nav>';
echo '<ul class="pagination">';

for ($i = 1; $i <= $total_pages; $i++) {
    echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
    echo '<a class="page-link" href="manage-subcategory.php?page=' . $i . '">' . $i . '</a>';
    echo '</li>';
}

echo '</ul>';
echo '</nav>';
?>

                           
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