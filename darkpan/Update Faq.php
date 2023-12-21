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

       
            <?php 

include "config.php";

$fq_id = $_GET["id"];


$query  = "SELECT * FROM `faq` WHERE `fq_id` = '{$fq_id}'";

$result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {

        $row = mysqli_fetch_assoc($result);



        ?>
            <center>
            <form method="post">
            <div class="col-md-6 mt-5">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update FAQ's</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Question" name="fques"  value="<?php echo $row["fq_ques"]; ?>">
                                <label for="floatingInput">Question</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput"
                                    placeholder="Answer" name="fans"  value="<?php echo $row["fq_ans"]; ?>">
                                <label for="floatingInput">Answer</label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3" name="btn_update">Update</button>

                            <?php

                        if (isset($_POST["btn_update"])) {
                            $fqu = $_POST["fques"];
                            $fqa = $_POST["fans"];

                            $query1 = "UPDATE `faq` SET `fq_ques`='$fqu',`fq_ans`='$fqa'  WHERE `fq_id`= '{$fq_id}'";

                            mysqli_query($conn, $query1);

                            if($query1){
                                
                            echo '<script>alert("Record Updated successfully")
                            window.location.href="Show Faq.php"
                            </script>';
                            
                            }

                            else{
                                echo mysqli_error($conn);
                            }
                        }
                        



                        ?>

                        </div>
                    </div>
                    </center>
                    </form>
                    <?php }?>



            




            