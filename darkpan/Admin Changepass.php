<?php

include "config.php";


if(!isset($_GET['id'])){
	
	header("location: login.php");
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
        <!-- Spinner End -->

        <?php include "navbar.php"; ?>
        <!-- Navbar End -->

        <center>
            <form method="post">
                <div class="col-md-6 mt-5">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Add Category</h6>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput"
                                placeholder="Old Password" name="old_password">
                            <label for="floatingInput">Old Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput"
                                placeholder="New Password" name="new_password">
                            <label for="floatingInput">New Password</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput"
                                placeholder="Confirm Password" name="confirm_password">
                            <label for="floatingInput">Confirm Password</label>
                        </div>
                            
                        <button type="submit" class="btn btn-primary mt-3" name="register">Submit</button>
                    </div>
                </div>
            </form>
        </center>

<?php


if(isset($_POST['register'])){
	$id = $_GET['id'];

$selectpass = "select * from admin where adm_id = $id";
$executepass = mysqli_query($conn,$selectpass);
$rowspass = mysqli_num_rows($executepass);
$fetchpass = mysqli_fetch_array($executepass);

	$old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
	$databaseOldPass = $fetchpass[3];
	if($old_password == $databaseOldPass){
		if($new_password == $confirm_password){
			$updatepass = "Update `admin` set `adm_pass` = '$new_password' where adm_id = $id";
			$execute = mysqli_query($conn, $updatepass);
			if($execute){
				echo '<script>
			alert("Password changed successfully");
			window.location.href = "index.php";
			</script>';
			}else{
				echo mysqli_error($conn);
			}
			
		}else{
			echo '<script>
			alert("New password does not match");
			</script>';
		}
		
		
	}
	
	
	else{
		echo '<script>
		alert("You entered old password wrong");
		</script>';
	}
	
	}
   
?>
