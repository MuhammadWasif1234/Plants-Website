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
            <h2>Service</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Service</li>
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
          
            

                <div class="col-12 col-lg-12">
                    <div class="alazea-benefits-area">
                        <div class="row">
<?php
    $ser = "SELECT * FROM `services` order by sr_id desc";
   $res2 = mysqli_query($conn, $ser);  
   while ($row = mysqli_fetch_array($res2)) {
?>  


                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-4">
                                <div class="single-benefits-area">
                                    <img src="../../darkpan/upload/service/<?php echo $row[3]?>" alt="">
                                    <h5><?php echo $row[1] ?></h5>
                                    <p class="text-justify"><?php echo $row[2] ?></p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <span class="btn btn-success">Rs. <?php echo $row[4] ?>  <span>
   </div>
                                </div>
                            </div>
<?php } ?>
                            
                        </div>
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