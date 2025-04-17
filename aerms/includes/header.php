<div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+91 9381472329</span>
                        </div>
                        <div class="col-md pr-4 d-flex medium align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-envelope"></span></div>
                            <span class="text"><a href="mailto:info@argrirentals.com" style="color: #FFFFFF; text-decoration: none;">info@argrirentals.com</a></span>
                        </div><?php } ?>
                         <?php if (strlen($_SESSION['uid']==0)) {?>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            
                            <a href="login.php"><span class="text" style="padding-left: 100px;">Login</span></a>
                            <a href="signup.php"><span class="text" style="padding-left: 100px;">Sign up</span></a>
                             <a href="admin/login.php"><span class="text" style="padding-left: 100px;">Admin</span></a>
                        </div><?php } ?>

                    </div>
                </div>
            </div>
          </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
        <a href="index.php"><img src="images/logo.png" alt="My Image" class="logo"></a>
        <a class="navbar-brand" href="index.php">AgriRentals Hub</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li id="link" class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                 <?php
$ret=mysqli_query($con,"select * from  tblcategory");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <a class="dropdown-item" href="categorywise-products.php?catid=<?php echo $row['ID'];?>"><?php  echo $row['CategoryName'];?></a> <?php 
$cnt=$cnt+1;
}?> 
               
              </div>
            </li>
     
              <li id="link" class="nav-item"><a href="about.php" class="nav-link">About</a></li>
              <li id="link" class="nav-item"><a href="shop.php" class="nav-link">Shop Page</a></li>
              <li id="link" class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
<!-- Google Translate Language Selector -->
<div class="language-selector">
    <span style="font-weight: bold; margin-right: 5px;">Select Language:</span>
    <div id="google_translate_element"></div>
</div>




                      <?php if (strlen($_SESSION['uid']!=0)) {?>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="my-booking.php">My Booking</a>
                <a class="dropdown-item" href="profile.php">Profile</a> 
                <a class="dropdown-item" href="change-password.php">Change Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
             
               
              </div>
            </li><?php } ?>
             
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->