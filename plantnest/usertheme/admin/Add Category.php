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
        <!-- Spinner End -->

        <?php include "navbar.php"; ?>
        <!-- Navbar End -->

        <center>
            <form method="post">
                <div class="col-md-6 mt-5">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Add Category</h6>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"
                                placeholder="Category Name" name="cat">
                            <label for="floatingInput">Category Name</label>
                        </div>
                            
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Enter Description"
                                id="floatingTextarea" style="height: 150px;" name="desc"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" name="btn_add">Submit</button>
                    </div>
                </div>
            </form>
        </center>

        <?php
        include 'config.php';

        if (isset($_POST['btn_add'])) {
            $name = $_POST['cat'];
            $desc = $_POST['desc'];

            $insert = "INSERT INTO `category`(`cate_name`, `cate_desc`) 
                       VALUES ('$name','$desc')";
            $execute = mysqli_query($conn, $insert);

            if ($execute) {
                echo "<script>
                    alert('Record added successfully');
                    window.location.href = 'Show Category.php';
                    </script>";
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>

</html>
