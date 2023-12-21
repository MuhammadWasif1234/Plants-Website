<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
  <!-- Title -->
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
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div><div class="container">
    <?php
            //2
               if (isset($_SESSION["msg"])) {?>
                  <div class="alert alert-success" role="alert">
                     <?php echo $_SESSION["msg"]; ?>
                  </div>
               <?php
                  unset($_SESSION["msg"]);
               }
               
            ?>
            </div>

    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                    
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="#" method="post" class="form-inline">
                                <select class="custom-select widget-title">
                                  <option selected>Short by Popularity</option>
                                  <option value="1">Short by Newest</option>
                                  <option value="2">Short by Sales</option>
                                  <option value="3">Short by Ratings</option>
                                </select>
                                <select class="custom-select widget-title">
                                  <option selected>Show: 9</option>
                                  <option value="1">12</option>
                                  <option value="2">18</option>
                                  <option value="3">24</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <?php
include "../config.php";
$query1 = "SELECT p.*, c.cate_name FROM products p
JOIN category c ON p.cate_id = c.cate_id ORDER BY pr_id DESC LIMIT 4";  // Updated the LIMIT to 4
$r = mysqli_query($conn, $query1);

if (mysqli_num_rows($r) > 0) {
?>
<?php
$cat = "SELECT * FROM `category` ";
$res = mysqli_query($conn, $cat);

if (mysqli_num_rows($res) > 0) {
?>
<div class="col-12 col-md-4 col-lg-3">
    <div class="shop-sidebar-area">
        
        <div class="shop-widget best-seller mb-50">
            <h4 class="widget-title">Best Seller</h4>
            <div class="widget-desc">
                <?php
                while ($row = mysqli_fetch_assoc($r)) {
                ?>
                <!-- Single Best Seller Products -->
                <div class="single-best-seller-product d-flex align-items-center">
                    <div class="product-thumbnail">
                        <a href="shop-details.php?id=<?php echo $row["pr_id"] ?>"> <img src="../../darkpan/upload/product/<?php echo $row["pr_img"] ?>" alt="<?php echo $row["pr_name"] ?>" width="50" height="50">
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="shop-details.php?id=<?php echo $row["pr_id"] ?>"><?php echo $row["pr_name"] ?></a>
                        <p>PKR. <?php echo $row["pr_price"] ?></p>
                    </div>
                </div>
                <?php }} } ?>
            </div>
        </div>
    </div>
</div>


                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                    <?php
                include "../config.php";
                if (isset($_GET["cat_id"])) {
                    $id = $_GET["cat_id"];
                
                    $query = "SELECT p.*, c.cate_name FROM products p
                              JOIN category c ON p.cate_id = c.cate_id where p.cate_id=$id";
                    
                }
                else{
                    $query = "SELECT p.*, c.cate_name FROM products p
                    JOIN category c ON p.cate_id = c.cate_id ";
                }
               
                
               
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    ?>    
                    <div class="row">
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                           
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                         
                                    <div class="product-img">
                                        <a href="shop-details.php?id=<?php echo $row["pr_id"] ?>"><img src="../../darkpan/upload/product/<?php echo $row["pr_img"] ?>"  alt="<?php echo $row["pr_name"] ?>"></a>
                                        <!-- Product Tag -->
                                       
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="shop-details.php?id=<?php echo $row["pr_id"] ?>" class="add-to-cart-btn">Shop Now</a>
                                            
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details.php?id=<?php echo $row["pr_id"] ?>">
                                            <p><?php echo $row["pr_name"] ?></p>
                                        </a>
                                        <h6>PKR. <?php echo $row["pr_price"] ?></h6>
                                    </div>
                                </div>
                            </div>

                            <?php }} ?>

                           

                        

                          
                            </div>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->

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