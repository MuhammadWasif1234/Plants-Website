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


            <center>
    <form method="post">
            <div class="col-md-6 mt-5">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Office Details</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Office Address" name="dtl_adrs" >
                                <label for="floatingInput">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="Email" name="dtl_email" >
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Contact Number" name="dtl_phn" >
                                <label for="floatingInput">Contact Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Days" name="dtl_days" >
                                <label for="floatingInput">Opening Days</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="btn_add">Submit</button>
                        </div>
                    </div>
                    </center>
                    </form>

                    <?php

include 'config.php';

if(isset($_POST['btn_add'])){
    $adrs = $_POST['dtl_adrs'];
    $email = $_POST['dtl_email'];
    $phone = $_POST['dtl_phn'];
    $days = $_POST['dtl_days'];

    $insert = "INSERT INTO `details`(`dt_address`, `dt_email`, `dt_phone`, `dt_hours`) 
               VALUES ('$adrs', '$email', '$phone', '$days')";
    
    $execute = mysqli_query($conn, $insert);

    if($execute){
        echo '<script>alert("Record Inserted successfully")
        window.location.href="Show Faq.php"
        </script>';
    } else {
        // Insertion failed
        echo "Error: " . mysqli_error($conn);
    }
}
  ?>



            




            