<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Plant Nest Admin Panel</title>
    <!-- Favicon -->
    <link href="img/pn.png" rel="icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

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

    <?php
    include "config.php";

    $adm_id = $_GET["id"];

    if (isset($_POST["btn_update"])) {
        $name = $_POST["name"];
        $mail = $_POST["email"];

        // Handle image upload

        if ($_FILES["img"]["error"] === 0) {
            $img = $_FILES["img"]["name"]; // Update image name if a new image is uploaded
            $target_dir = "upload/admin/";
            $target_file = $target_dir . basename($img);

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                // File upload success
            } else {
                echo "File upload failed.";
            }
        }

        $query1 = "UPDATE `admin` SET `adm_name`='$name',`adm_email`='$mail',`adm_img`='$img' WHERE `adm_id`='$adm_id'";

        $update_result = mysqli_query($conn, $query1);

        if ($update_result) {
            echo '<script>alert("Record Updated successfully")
                  window.location.href="logout.php"
                  </script>';
        } else {
            echo mysqli_error($conn);
        }
    }

    $query  = "SELECT * FROM `admin` WHERE `adm_id` = '{$adm_id}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <center>

        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Floating Label</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Name"
                            value="<?php echo htmlspecialchars($row["adm_name"]); ?>">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email"
                            placeholder="Email Address" value="<?php echo htmlspecialchars($row["adm_email"]); ?>">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="productImage" name="img">
                        <label for="productImage">Product Image</label>
                    </div>
                    <!-- Display the current image -->
                    <div class="form-floating mb-3">
                        <img src="upload/admin/<?php echo htmlspecialchars($row["adm_img"]); ?>"
                            alt="Product Image" width="100">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" name="btn_update">Update</button>
                </form>
            </div>
        </div>

    </center>
</body>

</html>
