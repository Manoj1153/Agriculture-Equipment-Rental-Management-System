
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
            <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
        </div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">AERMS</h2>
              <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
              <p><?php  echo $row['PageDescription'];?>.</p><?php } ?><br><br>
              <h6 class="ftco-heading-3">Follow Us</h6>
              <div class="social-icons mt-3">
                <a href="https://www.facebook.com/profile.php?id=100010660509335" target="_blank" title="Like us on Facebook for the latest updates" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank" title="Follow us on Twitter for real-time updates" class="social-link"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://instagram.com" target="_blank" title="Follow us on Instagram to stay connected" class="social-link"><i class="fab fa-instagram"></i></a>
              </div>

            </div>
          </div>



          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">Home</a></li>
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.php" class="py-2 d-block">About Us</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>

              </ul>
            </div>
          </div>
        
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Have a Questions ?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                    <li><span class="icon icon-map-marker"></span><span class="text"><?php  echo $row['PageDescription'];?></span></li><br>
                    <li><span class="icon icon-phone"></span><span class="text">+91 9381472329</span></li><br>
                    <li><span class="icon icon-envelope"></span><span class="text"><a href="mailto:info@argrirentals.com" style="color: ; text-decoration: none;">info@argrirentals.com</a></span></li><?php } ?>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          <p>
             Copyright &copy; <span id="year"></span>. All rights reserved by AERMS.
          </p>
          </div>
        </div>
      </div>
    <script>
         document.getElementById('year').textContent = new Date().getFullYear();
    </script>
    </footer>
    
  

  <!-- loader -->
