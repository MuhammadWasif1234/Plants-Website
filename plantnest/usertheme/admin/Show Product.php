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

            <div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Category Table</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr style="text-align:center;">
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                include "config.php";
                $query = "SELECT p.*, c.cate_name FROM products p
                          JOIN category c ON p.cate_id = c.cate_id";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr style="text-align:center;">
                                <th scope="row"><?php echo $row["pr_id"] ?></th>
                                <td><?php echo $row["pr_name"] ?></td>
                                <td><?php echo $row["pr_price"] ?></td>
                                <td>
                                    <img src="upload/product/<?php echo $row["pr_img"] ?>" alt="<?php echo $row["pr_name"] ?>" width="50" height="50">
                                </td>
                                <td><?php echo $row["cate_name"] ?></td>
                                <td><?php echo $row["p_quantity"] ?></td>
                                <td><?php echo $row["p_status"] ?></td>
                                <td>
                                    <a href='Update Product.php?id=<?php echo $row["pr_id"] ?>'><button type="button" class="btn btn-outline-warning m-2 mr-5"><i class="bi bi-pencil"></i></button></a>
                                    <a href='Delete Product.php?id=<?php echo $row["pr_id"] ?>'><button type="button" class="btn btn-outline-danger m-2"><i class="bi bi-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>



            




            