<?php
include('includes/dbconnection.php');
if(!empty($_POST["cat_id"])) {
    $id = intval($_POST['cat_id']);
    $query = mysqli_query($con, "SELECT * FROM tblsubcategory WHERE CategoryID = $id");

    echo '<option value="">Select Subcategory</option>';

    while($row = mysqli_fetch_array($query)) {
        echo '<option value="'.htmlentities($row['ID']).'">'.htmlentities($row['SubcategoryName']).'</option>';
    }
}
?>