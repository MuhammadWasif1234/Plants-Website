
<?php

use PSpell\Config;

session_start();
include_once "../config.php";
?>
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
<?php 
$cat = "SELECT cate_id,cate_name FROM category ";
$rs = mysqli_query($conn, $cat);

$menuItems = array();
while ($row = mysqli_fetch_assoc($rs)) {
    $menuItems[] = $row;
}  ?>
<?php


$query = "SELECT * FROM `details` order by dt_id desc limit 1";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
    ?>
<body>
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex align-items-center justify-content-between">
                    <!-- Top Header Content -->
                    <div class="top-header-meta">
                    <?php
                      
                      while($row=mysqli_fetch_assoc($result))
                      {

         
                      
                      ?>
                        <a href="mailto:xyz@gmail.com" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span><?php echo $row["dt_email"]; ?></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span><?php echo  $row["dt_phone"];?>
          </span></a>
                 <?php } 
                 } 
                 ?>
                    </div>

                    <!-- Top Header Content -->
                    <div class="top-header-meta d-flex">

                        <?php
                        if (isset($_SESSION["user_name"])) {
                            $userName = $_SESSION["user_name"];
                        ?>
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <!-- <div class="account-img-main" style="display:inline-block;" >
                                        <img src="img/demo-account.JPG" alt="" class="account-img" style="width: 20px; height:20px; border-radius:100%;" >
                                    </div> -->
                                <div class="dropdown" style="display:inline-block;">
                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $userName ?></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="edit.php">Edit Profile Details</a>
                                        <!-- <a class="dropdown-item" href="javascript:void(0);" onclick="confirmDelete()">Delete Your Account</a> -->
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Login -->
                        <?php } else {
                        ?>
                            <div class="login">
                                <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                        <?php } ?>

                        <!-- Cart -->
                        <div class="cart">
                            <a href="viewcart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity">(<?php if (isset($_SESSION["mycart"])) {
                              echo count($_SESSION["mycart"]); 
                           }
                           else{
                              echo 0;
                           } 
                           ?>)</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Navbar Area ***** -->
<div class="alazea-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="alazeaNav">

                <!-- Nav Brand -->
                <a href="index.php" class="nav-brand"><img src="img/pn.png" alt="" style="width: 120px; height: 100px;"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Navbar Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="#">Categories</a>
                            <?php

$query = "SELECT * FROM `category`";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
    ?>
                                <ul class="dropdown">
                                <?php
                      
                      while($row=mysqli_fetch_assoc($result))
                      {

         
                      
                      ?>
                                    <li><a href="shop.php?cat_id=<?php echo $row["cate_id"] ?>"><?php echo $row["cate_name"] ?></a></li>
                                    <?php }} ?>
                                </ul>
                            </li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="service.php">Service</a></li>

                            
                        </ul>

                        <!-- Search Icon -->
                        <div id="searchIcon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>

                    </div>
                    <!-- Navbar End -->
                </div>
            </nav>

            <!-- Search Form -->
            <div class="search-form">
                <form action="#" method="get">
                    <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                    <button type="submit" class="d-none"></button>
                </form>
                <!-- Close Icon -->
                <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
</div>
</header>
<!-- ##### Header Area End ##### -->


<script>
function confirmDelete() {
    var confirmation = confirm("Are you sure you want to delete your account?");
    if (confirmation) {
        window.location.href = "delete.php"; // Redirect to delete_account.php if confirmed
    }
}
</script>
