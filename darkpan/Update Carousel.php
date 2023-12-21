<?php
include "config.php";

$cr_id = $_GET["id"];

if (isset($_POST["btn_update"])) {
    $name = $_POST["pr_name"];
    $price = $_POST["pr_price"];

    // Handle image upload

    if ($_FILES["pr_img"]["error"] === 0) {
        $img = $_FILES["pr_img"]["name"]; // Update image name if a new image is uploaded
        $target_dir = "upload/carousel/";
        $target_file = $target_dir . basename($img);

        if (move_uploaded_file($_FILES["pr_img"]["tmp_name"], $target_file)) {
            // File upload success
        } else {
            echo "File upload failed.";
        }
    }

    $query1 = "UPDATE `carousel` SET `cr_heading`='$name',`cr_desc`='$price',`cr_img`='$img' WHERE `cr_id`='$cr_id'";

    $update_result = mysqli_query($conn, $query1);

    if ($update_result) {
        echo '<script>alert("Record Updated successfully")
                            window.location.href="Show Carousel.php"
                            </script>';
    } else {
        echo mysqli_error($conn);
    }
}

$query  = "SELECT * FROM `carousel` WHERE `cr_id` = '{$cr_id}'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
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
            <form method="post" enctype="multipart/form-data">
                <div class="col-md-6 mt-5">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Update Product</h6>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="productName"
                                placeholder="Product Name" name="pr_name" value="<?php echo $row["cr_heading"]; ?>">
                            <label for="productName">Product Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="productPrice"
                                placeholder="Product Price" name="pr_price" ><?php echo $row["cr_desc"]; ?></textarea>
                            <label for="productPrice">Product Price</label>
                        </div>

                        <div class="form-floating mb-3">
    <input type="file" class="form-control" id="productImage" name="pr_img">
    <label for="productImage">Product Image</label>
</div>

<!-- Display the current image -->
<div class="form-floating mb-3">
    <img src="upload/carousel/<?php echo $row["cr_img"]; ?>" alt="Product Image" width="100">
</div>

                       

                        

                        <button type="submit" class="btn btn-primary mt-3" name="btn_update">Update</button>
                    </div>
                </div>
            </form>
        </center>
    </div>
</body>

</html>
