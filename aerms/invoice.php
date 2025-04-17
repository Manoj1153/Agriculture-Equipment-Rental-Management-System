<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }

        function f3() {
            window.print();
        }
    </script>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>AgriRentals Hub - Invoice</title>
        <link rel="icon" href="images/logo.png" type="image/x-icon" sizes="32x32">
        <style>
             body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 90%;
                margin: 20px auto;
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                border-bottom: 1px solid #ddd;
                padding-bottom: 20px;
            }
            .header .left {
                display: flex;
                align-items: center;
                gap: 15px;
            }
            .header .left h2 
            {
                font-weight: 800;
                font-size: 20px;
                margin-bottom: 10px;
                color: #82ae46;
            }
            .details {
                margin-top: 15px;
                padding: 10px 0;
                border-bottom: 1px solid #ddd;
                font-size: 14px;
                line-height: 1.6;
            }
            .header .right {
                width: 45%;
                text-align: right;
            }
            .addresses {
                margin-top: 10px;
            }
            
            .addresses .billing {
                text-align: right;
            }
            .addresses .shipping {
                text-align: right;
                margin-top: 10px;
            }
            .addresses p 
            {
                margin-top: -15px;
            } 

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table, th, td 
            {
                border: 1px solid #ddd;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                font-size: 14px;
            }
            .logo 
            {
                width: 90px;
                height: 60px;
                object-fit: contain;
            }
            .logo-text 
            {
                display: flex;
                align-items: center;
                gap: 10px;
            }

        </style>
    </head>
    <body>

    <div class="container">
    <div class="container">
    <!-- Header -->
    <div class="header">
        <!-- Left Section -->
        <div class="left">
            <div class="logo-text">
                <img src="images/logo.png" alt="My Image" class="logo">
                <h2>AgriRentals Hub</h2>
            </div>
        </div>

        <!-- Right Section -->
        <div class="right">
            <p><strong>Invoice Number:</strong> #<?php echo $_GET['invid']; ?></p>
            <p><strong>Order Date:</strong> <?php echo date('d/m/Y'); ?></p>
        </div>
    </div>

    <!-- Address, GST, and PAN Section -->
    <div class="details">
        <p><strong>Address :</strong><br>Flat No: 207, Alluri Residential complex,<br>bhagyanagar colony, KPHB, Hyderabad - 500072</p>
        <p><strong>PAN No :</strong> AAECD1234M</p>
        <p><strong>GST Registration No :</strong> 36AAECD1234M1Z8</p>
    </div>
</div>

    </div>

        <!-- Billing and Shipping Addresses -->
        <?php
        $invid = $_GET['invid'];
        $query = mysqli_query($con, "SELECT tblbooking.UserID, tblbooking.DeliveryAddress, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email FROM tblbooking JOIN tbluser ON tbluser.ID = tblbooking.UserID WHERE tblbooking.BookingNumber=$invid");
        $row = mysqli_fetch_array($query);
        ?>
        <div class="addresses">
            <div class="billing">
                <h3>Billing Address :</h3>
                <p><?php echo $row['FirstName'] . " " . $row['LastName']; ?></p>
                <p><?php echo $row['DeliveryAddress']; ?></p>
                <p><strong>State:</strong> Telangana | <strong>Code:</strong> 36</p>
            </div>
            <div class="shipping">
                <h3>Shipping Address :</h3>
                <p><?php echo $row['FirstName'] . " " . $row['LastName']; ?></p>
                <p><?php echo $row['DeliveryAddress']; ?></p>
                <p><strong>Place of Supply :</strong> Telangana</p>
                <p><strong>Place of Delivery :</strong> Telangana</p>
                <p><strong>Invoice Number:</strong> #<?php echo $_GET['invid']; ?></p>
                <p><strong>Invoice Date:</strong> <?php echo date('d/m/Y'); ?></p>
            </div>
        </div>

        <!-- Product Table -->
        <table>
            <thead>
            <tr>
                <th>Sl. No</th>
                <th>Description</th>
                <th>HSN</th>
                <th>Rental Price</th>
                <th>Qty</th>
                <th>No. of Days</th> <!-- New Column -->
                <th>GST (%)</th>
                <th>Tax Amount</th>
                <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($con, "SELECT tblbooking.ID as bid, DATEDIFF(tblbooking.ToDate, tblbooking.FromDate) as ddf, tblbooking.ProductID, tblbooking.Quantity, tblproduct.ProductName, tblproduct.RentPrice FROM tblbooking JOIN tblproduct ON tblproduct.ID=tblbooking.ProductID WHERE tblbooking.BookingNumber=$invid");
            $cnt = 1;
            $total_tax = 0;
            $grand_total = 0;

            while ($row = mysqli_fetch_array($query)) {
                $unit_price = $row['RentPrice'];
                $qty = $row['Quantity'];
                $ddf = $row['ddf']; // Number of days
                $gst_rate = 18; // Assuming GST is 18% (9% CGST and 9% SGST)
                $taxable_amount = $unit_price * $qty * $ddf; // Total rent for the days booked
                $tax_amount = ($taxable_amount * $gst_rate) / 100;
                $total_amount = $taxable_amount + $tax_amount; // Total amount including GST

                $total_tax += $tax_amount;
                $grand_total += $total_amount;
                
                // Daily Rent Calculation
                $daily_rent = $unit_price * $qty; // Rent for the day (before GST)
                ?>
                <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo $row['ProductName']; ?></td>
                    <td>997311</td>
                    <td>₹<?php echo number_format($unit_price, 2); ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo $ddf; ?></td> <!-- Display Number of Days -->
                    <td><?php echo $gst_rate; ?>%</td>
                    <td>₹<?php echo number_format($tax_amount, 2); ?></td>
                    <td>₹<?php echo number_format($total_amount, 2); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <?php 
           function convertToWords($num) {
            $ones = array(
                "", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine",
                "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"
            );
            $tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");
            
            if ($num < 20) {
                return $ones[$num];
            } elseif ($num < 100) {
                return $tens[intval($num / 10)] . ($num % 10 != 0 ? " " . $ones[$num % 10] : "");
            } elseif ($num < 1000) {
                return $ones[intval($num / 100)] . " Hundred" . ($num % 100 != 0 ? " and " . convertToWords($num % 100) : "");
            } elseif ($num < 100000) {
                return convertToWords(intval($num / 1000)) . " Thousand" . ($num % 1000 != 0 ? " " . convertToWords($num % 1000) : "");
            } elseif ($num < 10000000) {
                return convertToWords(intval($num / 100000)) . " Lakh" . ($num % 100000 != 0 ? " " . convertToWords($num % 100000) : "");
            } else {
                return convertToWords(intval($num / 10000000)) . " Crore" . ($num % 10000000 != 0 ? " " . convertToWords($num % 10000000) : "");
            }
        }
        ?>
        
        <!-- Summary -->
        <div class="summary">
            <p><strong>Total Tax:</strong> ₹<?php echo number_format($total_tax, 2); ?></p>
            <p><strong>Grand Total:</strong> ₹<?php echo number_format($grand_total, 2); ?></p>
            <p><strong>Amount in Words:</strong> <?php echo convertToWords($grand_total); ?> Rupees Only</p>
        </div>

        <!-- Authorized Signatory Section -->
        <div class="footer">
    <div style="margin-top: 50px; text-align: right;">
        <p>For <strong>AgriRentals Hub :</strong></p>
        <!-- Signature Box -->
        <div style="margin-top: 5px; margin-left: 78%;  height: 50px; width: 150px; border: 1px solid #ddd; display: flex; justify-content: center; align-items: center; margin-right: 0;">
            <img src="images/signature.png" alt="Authorized Signatory" style="height: 80px; width: auto;">
        </div>
        <p style="margin-top: 10px;"><strong>Authorized Signatory</strong></p>
    </div>
    <h3>Thank you for choosing AgriRentals Hub!</h3>
</div>

    </div>

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
    </body>
    </html>
<?php } ?>
