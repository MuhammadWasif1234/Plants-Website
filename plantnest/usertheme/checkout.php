<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Plant Nest Admin</title>
     <!-- Favicon -->
     <link href="img/pn.png" rel="icon">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <?php include "header.php" ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
<?php
$id = $_SESSION["user_id"];
$querys = mysqli_query($conn,"SELECT * FROM `user` WHERE `usr_id` = $id");
$data = mysqli_fetch_array($querys);

?>
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Billing Details</h5>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="first_name">User Name *</label>
                                    <input type="text" class="form-control" id="first_name" value="<?php echo $data[1] ?>" required>
                                </div>
                               
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" class="form-control" id="email_address" value="<?php echo $data[6] ?>">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="text" class="form-control" id="phone_number"  value="<?php echo $data[5] ?>">
                                </div>
                              
                                <div class="col-12 mb-4">
                                    <label for="company">Address *</label>
                                    <input type="text" class="form-control" id="address"  value="<?php echo $data[2] ?>">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">Town/City *</label>
                                    <input type="text" class="form-control" id="city"  value="<?php echo $data[3] ?>">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="state">State/Province *</label>
                                    <input type="text" class="form-control" id="state" value="">
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="postcode"  value="<?php echo $data[4] ?>">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" id="order-notes" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <!-- Single Checkbox -->
                                       
                                        <!-- Single Checkbox -->
                                      
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Subtotal</h5>
                            <h5><?php echo "Rs." .$_SESSION["totalPrice"] ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Shipping</h5>
                            <h5>Rs. 200</h5>
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total</h5>
                            <h5><?php echo "Rs.". (int)$_SESSION["totalPrice"] + 200 ?></h5>
                        </div>
                        <div class="checkout-btn mt-30">
                            <a href="#" class="btn alazea-btn w-100">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include "footer.php" ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>