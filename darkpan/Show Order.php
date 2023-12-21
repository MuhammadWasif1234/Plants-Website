<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>Plant Nest Admin Panel </title>
     <!-- Favicon -->
     <link href="img/pn.png" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       

            <?php include "navbar.php" ?>
            <!-- Navbar End -->

            <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Orders</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="text-align:center;">
                                <th scope="col">#</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Check id</th>
                                <th scope="col">User id</th>
                              
                            </tr>
                        </thead>
                        <?php

include "config.php";
$query = "SELECT * FROM `cart`";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
    ?>
                        <tbody>
<?php
                      
                      while($row=mysqli_fetch_assoc($result))
                      {

         
                      
                      ?>
                        <tbody>
                            <tr style="text-align:center;">
                                <th scope="row"><?php echo $row["cart_id"] ?></th>
                                <td><?php echo $row["cart_quantity"] ?></td>
                                <td><?php echo $row["cart_price"] ?></td>
                                <td><?php echo $row["cart_date"] ?></td>
                                <td><?php echo $row["p_id"] ?></td>
                                <td><?php echo $row["check_id"] ?></td>
                                <td><?php echo $row["u_id"] ?></td>
                                
                                
                            </tr>

                        </tbody>
                        
                        <?php } } ?>
                    </table>
                </div>
            </div>
        </div>




            




            