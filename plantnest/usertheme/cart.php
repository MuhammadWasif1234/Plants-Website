<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Plant Nest Admin</title>
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
                <h2>Cart</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Cart Area Start ##### -->
        <div class="cart-area section-padding-0-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>TOTAL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="img/bg-img/34.jpg" alt="Product"></a>
                                            <h5>Recuerdos Plant</h5>
                                        </td>
                                        <td class="qty">
                                            <div class="quantity">
                                                <span class="qty-minus" onclick="decreaseQty();"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">
                                                <span class="qty-plus" onclick="increaseQty();"><i class="fa fa-plus" aria-hidden="true"></i></span>

                                            </div>
                                        </td>
                                        <td class="price"><span>$9.99</span></td>
                                        <td class="total_price"><span>$9.99</span></td>
                                        <td class="action"><a href="#"><i class="icon_close"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Coupon Discount -->
                    <div class="col-12 col-lg-6">
                        <div class="coupon-discount mt-70">
                            <h5>COUPON DISCOUNT</h5>
                            <p>Coupons can be applied in the cart prior to checkout. Add an eligible item from the booth of the seller that created the coupon code to your cart. Click the green "Apply code" button to add the coupon to your order. The order total will update to indicate the savings specific to the coupon code entered.</p>
                            <form action="#" method="post">
                                <input type="text" name="coupon-code" placeholder="Enter your coupon code">
                                <button type="submit">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Totals -->
                    <div class="col-12 col-lg-6">
                        <div class="cart-totals-area mt-70">
                            <h5 class="title--">Cart Total</h5>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Subtotal</h5>
                                <h5>$9.99</h5>
                            </div>
                            <div class="shipping d-flex justify-content-between">
                                <h5>Shipping</h5>
                                <div class="shipping-address">
                                    <form action="#" method="post">
                                        <select class="custom-select">
                                            <option selected>Country</option>
                                            <option value="1">USA</option>
                                            <option value="2">Latvia</option>
                                            <option value="3">Japan</option>
                                            <option value="4">Bangladesh</option>
                                        </select>
                                        <input type="text" name="shipping-text" id="shipping-text" placeholder="State">
                                        <input type="text" name="shipping-zip" id="shipping-zip" placeholder="ZIP">
                                        <button type="submit">Update Total</button>
                                    </form>
                                </div>
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5>Total</h5>
                                <h5>$9.99</h5>
                            </div>
                            <div class="checkout-btn">
                                <a href="#" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ##### Cart Area End ##### -->

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