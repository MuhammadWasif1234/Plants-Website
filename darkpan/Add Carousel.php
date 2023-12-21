<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if (isset($_POST['btn_add'])) {
    $pr_name = mysqli_real_escape_string($conn, $_POST['pr_name']);
    $pr_price = mysqli_real_escape_string($conn, $_POST['pr_price']);
    $pr_img = $_FILES['pr_img']['name'];
    $pr_img_tmp = $_FILES['pr_img']['tmp_name'];

    // Upload image to a designated folder
    $upload_path = "upload/carousel/";
    $target_file = $upload_path . basename($pr_img);

    if (move_uploaded_file($pr_img_tmp, $target_file)) {
        // Insert into carousel table
        $insert = "INSERT INTO `carousel`(`cr_heading`, `cr_desc`, `cr_img`) VALUES ('$pr_name','$pr_price','$pr_img')";
        $execute = mysqli_query($conn, $insert);

        if ($execute) {
            echo "<script>
                    alert('Product added successfully');
                    window.location.href = 'Show Carousel.php';
                    </script>";
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

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
        <!-- Spinner Start -->
        <?php include "loader.php" ?>
        <!-- Spinner End -->


            <?php include "navbar.php" ?>
            <!-- Navbar End -->
            <center>
            <center>
            <form method="post" enctype="multipart/form-data">
                <div class="col-md-6 mt-5">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Add Product</h6>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="productName"
                                placeholder="Carousel Heading" name="pr_name">
                            <label for="productName">Heading</label>
                        </div>
                            
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="productPrice"
                                placeholder="Description" name="pr_price"></textarea>
                            <label for="productPrice">Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="productImage"
                                name="pr_img">
                            <label for="productImage">Product Image</label>
                        </div>

                      


                        <button type="submit" class="btn btn-primary mt-3" name="btn_add">Submit</button>
                    </div>
                </div>
            </form>
        </center>

       


            



            