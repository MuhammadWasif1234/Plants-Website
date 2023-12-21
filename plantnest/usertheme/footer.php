<?php

include "../config.php";

$query = "SELECT * FROM `details` order by dt_id desc limit 1";
$resul = mysqli_query($conn, $query);

if (mysqli_num_rows($resul) > 0) {
?>
    <?php
    $abt = "SELECT * FROM `about` order by abt_id desc limit 1";
    $res = mysqli_query($conn, $abt);

    if (mysqli_num_rows($res) > 0) {
    ?>
        <?php
        $query1 = "SELECT p.*, c.cate_name FROM products p
                          JOIN category c ON p.cate_id = c.cate_id";
        $r = mysqli_query($conn, $query1);

        if (mysqli_num_rows($r) > 0) {
        ?>
            <footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
                <!-- Main Footer Area -->
                <div class="main-footer-area">
                    <div class="container">
                        <div class="row">

                            <!-- Single Footer Widget -->
                            <div class="col-12 col-sm-6 col-lg-3 ">



                                <div class="single-footer-widget mt-2">

                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?><div class="widget-title">
                                            <h5>About</h5>
                                        </div>
                                        <p> <?php echo $row["abt_desc"]; ?></p>
                                </div>
                            </div>
                    <?php }
                                }
                    ?>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <!-- <li><a href="#">Purchase</a></li> -->
                                    <li><a href="faq.php">FAQs</a></li>
                                    <li><a href="#">Reviews</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Category</a></li>
                                    <!-- <li><a href="#">shop</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Policities</a></li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>
                            <?php
                            while ($row = mysqli_fetch_assoc($r)) {
                            ?>
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.php"> <img src="../../darkpan/upload/product/<?php echo $row["pr_img"] ?>" alt="<?php echo $row["pr_name"] ?>" width="50" height="50">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.php"><?php echo $row["pr_name"] ?></a>
                                        <p>PKR. <?php echo $row["pr_price"] ?></p>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                        <!-- Single Best Seller Products -->
                        
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>
                            <?php

                            while ($row = mysqli_fetch_assoc($resul)) {
                            ?>
                                <div class="contact-information">
                                    <p><span>Address:</span> <?php echo $row["dt_address"]; ?> </p>
                                    <p><span>Phone:</span> <?php echo $row["dt_phone"]; ?></p>
                                    <p><span>Email:</span> <?php echo $row["dt_email"]; ?> </p>
                                    <p><span>Open hours:</span> <?php echo $row["dt_hours"]; ?></p>
                                </div>
                        <?php }
                        }
                        ?>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <center>
                    <!-- Footer Bottom Area -->
                    <div class="footer-bottom-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="border-line"></div>
                                </div>
                                <!-- Copywrite Text -->
                                <div class="col-12 col-md-12">
                                    <div class="copywrite-text">
                                        <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                            Developed by Aptech Students
                                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        </p>
                                    </div>
                                </div>
                </center>
                </div>
                </div>
                </div>
            </footer>