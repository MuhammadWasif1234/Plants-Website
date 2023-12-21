<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Plant Nest Admin</title>
     <!-- Favicon -->
     <link href="img/pn.png" rel="icon">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<?php
include "../config.php";

$abt = "SELECT * FROM `about` order by abt_id desc limit 1";
$res = mysqli_query($conn, $abt);

if (mysqli_num_rows($res) > 0) {
?>
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
            <h2>ABOUT US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <?php

while ($row = mysqli_fetch_assoc($res)) {
?>
                    <div class="section-heading mt-5">
                        <h2> <?php echo $row["abt_heading"]; ?></h2>
                    <p></p>

                    </div>
                    <p> <?php echo $row["abt_desc"]; ?></p>
<?php }}?>
                    <!-- Progress Bar Content Area -->
                   
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
<?php
    $ser = "SELECT * FROM `services` order by sr_id desc limit 2";
   $res2 = mysqli_query($conn, $ser);  
   while ($row = mysqli_fetch_array($res2)) {
?>  


                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="../../darkpan/upload/service/<?php echo $row[3]?>" alt="">
                                    <h5><?php echo $row[1] ?></h5>
                                    <p class="text-justify"><?php echo $row[2] ?></p>
                                </div>
                            </div>
<?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Service Area Start ##### -->
   
    <!-- ##### Service Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
   
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area bg-img section-padding-100-0" style="background-image: url(img/bg-img/cool-facts.png);">
        <div class="container">
            <div class="row">

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf1.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">20</span></h2>
                            <h6>AWARDS</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf2.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">70</span></h2>
                            <h6>PROJECTS</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf3.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">30</span>+</h2>
                            <h6>HAPPY CLIENTS</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf4.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">80</span>K+</h2>
                            <h6>REVENUE</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Side Image -->
        <div class="side-img wow fadeInUp" data-wow-delay="500ms">
            <img src="img/core-img/pot.png" alt="">
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Team Area Start ##### -->
   
    <!-- ##### Team Area End ##### -->

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