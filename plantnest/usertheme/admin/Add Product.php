
<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
                                placeholder="Product Name" name="pr_name">
                            <label for="productName">Product Name</label>
                        </div>
                            
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="productPrice"
                                placeholder="Product Price" name="pr_price">
                            <label for="productPrice">Product Price</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="productImage"
                                name="pr_img">
                            <label for="productImage">Product Image</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="productQuantity"
                                placeholder="Product Quantity" name="p_quantity">
                            <label for="productQuantity">Product Quantity</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="status" name="p_status">
                                <option selected>Status</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                            <label for="status">Product Status</label>
                        </div>

                        <div class="form-floating mb-3">
    <select class="form-select" id="category" name="p_cat">
        <option selected disabled>Select a Category</option>
        <?php
        include 'config.php';

        $category_query = "SELECT `cate_id`, `cate_name` FROM `category`";
        $category_result = mysqli_query($conn, $category_query);

        while ($row = mysqli_fetch_assoc($category_result)) {
            echo "<option value='" . $row['cate_id'] . "'>" . $row['cate_name'] . "</option>";
        }
        ?>
    </select>
    <label for="category">Category</label>
</div>


                        <button type="submit" class="btn btn-primary mt-3" name="btn_add">Submit</button>
                    </div>
                </div>
            </form>
        </center>

        <?php
        include 'config.php';

        if (isset($_POST['btn_add'])) {
            $pr_name = $_POST['pr_name'];
            $pr_price = $_POST['pr_price'];
            $pr_img = $_FILES['pr_img']['name'];
            $pr_img_tmp = $_FILES['pr_img']['tmp_name'];
            $p_quantity = $_POST['p_quantity'];
            $p_status = $_POST['p_status'];
            $cate_id = $_POST['p_cat'];

            // Upload image to a designated folder
            $upload_path = "upload/product/"; // Change this to your desired upload folder path
            $target_file = $upload_path . basename($pr_img);

            if (move_uploaded_file($pr_img_tmp, $target_file)) {
                // Insert into products table
                $insert = "INSERT INTO `products`(`pr_name`, `pr_price`, `pr_img`, `cate_id`, `p_quantity`, `p_status`) 
                           VALUES ('$pr_name','$pr_price','$pr_img','$cate_id','$p_quantity','$p_status')";
                $execute = mysqli_query($conn, $insert);

                if ($execute) {
                    echo "<script>
                        alert('Product added successfully');
                        window.location.href = 'Show Product.php';
                        </script>";
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "Failed to upload image.";
            }
        }
        ?>


            



            