<?php

// 1
error_reporting(0);
session_start();

   if (!isset($_SESSION["mycart"])) {
      $_SESSION["mycart"] = array();
      $_SESSION["quan"] = array();


   }
   

?>
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
                <h2>SHOP DETAILS</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- ##### Single Product Details Area Start ##### -->
        <section class="single_product_details_area mb-50">
            <div class="produts-details--content mb-50">
            <?php
            $id = $_GET["id"];
            
             $query = "SELECT p.*, c.cate_name FROM products p
             JOIN category c ON p.cate_id = c.cate_id where pr_id = $id";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
        
      
    
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="single_product_thumb">
                                <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <a class="product-img" href="" title="Product Image">
                                                <img class="d-block w-100" src="../../darkpan/upload/product/<?php echo $row["pr_img"] ?>" alt="1">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mt-5">
                            <div class="single_product_desc">
                                <h4 class="title mt-5"><?php echo $row["pr_name"] ?></h4>
                                <h4 class="price ">Rs. <?php echo $row["pr_price"] ?></h4>
                                <div class="products--meta">
                                    <p><span>Status:</span> <span><?php echo $row["p_status"] ?></span></p>
                                    <p><span>Category:</span> <span><?php echo $row["cate_name"] ?></span></p>
                                </div>
                                <?php if($row["p_status"] == "Available"){ ?>
                                    <div class="cart--area d-flex flex-wrap align-items-center">
                                    <!-- Add to Cart Form -->
                                    <form action="addtocart.php" class="cart clearfix d-flex align-items-center" method="post">
                                        <div class="quantity">
                                           <input type="hidden" name="Pro_ID" value="<?php echo $id?>">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                            
                                           
                                        </div>
                                        <button type="submit" class="btn alazea-btn ml-15" name="btn">Add to cart</button>
                                       
                                    </form>
                                    <!-- Wishlist & Compare -->
                                    <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                        <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                        
                                    </div>
                                </div>
                              <?php  }?>
                                

                               

                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_details_tab clearfix">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" role="" id="product-details-tab">
                              
                            <a href="" class="nav-link">Review</a>
                                <!-- <li class="nav-item">
                                    <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span class="text-muted">(1)</span></a>
                                </li> -->
                            </ul>
                            <!-- Tab Content -->
                            <div class="">
                             
                                <div role="tabpanel" class="" id="reviews">
                                    <div class="reviews_area">
                                        <ul>

                                            <li>
                                                <?php
                                                    $fetch_rat = mysqli_query($conn,"SELECT * FROM `reviews` where p_id = $id");
                                                    while($data = mysqli_fetch_array($fetch_rat)){ ?>
                                                        <div class="single_user_review mb-15">
                                                        <div class="review-rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            
                                                        </div>
                                                        <div class="review-details">
                                                        <span><b><?php echo $data[5]; ?></b> Commented</span>
                                                        <span><?php echo $data[2]; ?></span>
                                                        </div>
                                                    </div>
                                               <?php     }

                                                ?>
                                                
                                                   
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="submit_a_review_area mt-50">
                                        <h4>Submit A Review</h4>
                                        <form action="addreview.php" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group d-flex align-items-center">
                                                        <input type="hidden" name="id" value="<?php echo $id?>">
                                                        <span class="mr-15">Your Ratings:</span>
                                                        <div class="stars">
                                                            <select name="rating" id="" class="form-control" >
                                                                <option value="1">1</option>
                                                                <option value="2">2 </option>
                                                                <option value="3">3</option>
                                                                <option value="4">4 </option>
                                                                <option value="5">5</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Nickname</label>
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nazrul">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="options">Reason for your rating</label>
                                                        <select class="form-control" id="options" name="reason">
                                                            <option>Quality</option>
                                                            <option>Value</option>
                                                            <option>Design</option>
                                                            <option>Price</option>
                                                            <option>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="comments">Comments</label>
                                                        <textarea class="form-control" id="comments" rows="5" data-max-length="150" name="comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn alazea-btn" name="btn">Submit Your Review</button>
                                                </div>
                                            </div>
                                        </form>

                                       
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Single Product Details Area End ##### -->

        <!-- ##### Related Product Area Start ##### -->
        <div class="related-products-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="shop-details.php"><img src="img/bg-img/40.png" alt=""></a>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">Hot</a>
                                </div>
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.php">
                                    <p>Cactus Flower</p>
                                </a>
                                <h6>$10.99</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="shop-details.php"><img src="img/bg-img/41.png" alt=""></a>
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.php">
                                    <p>Cactus Flower</p>
                                </a>
                                <h6>$10.99</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="shop-details.php"><img src="img/bg-img/42.png" alt=""></a>
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.php">
                                    <p>Cactus Flower</p>
                                </a>
                                <h6>$10.99</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-100">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="shop-details.php"><img src="img/bg-img/43.png" alt=""></a>
                                <!-- Product Tag -->
                                <div class="product-tag sale-tag">
                                    <a href="#">Hot</a>
                                </div>
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <a href="cart.php" class="add-to-cart-btn">Add to cart</a>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.php">
                                    <p>Cactus Flower</p>
                                </a>
                                <h6>$10.99</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ##### Related Product Area End ##### -->
   
        <!-- ##### Footer Area Start ##### -->
    <?php include "footer.php" ?>
    <!-- ##### Footer Area End ##### -->

    
</body>

</html>