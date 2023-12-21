<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header-area">

<!-- ***** Top Header Area ***** -->
<?php include "header.php" ?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>SHOP DETAILS</h2>
    </div>

    
<?php
            //2
               if (isset($_SESSION["msg"])) {?>
                  <div class="alert alert-danger" role="alert">
                     <?php echo $_SESSION["msg"]; ?>
                  </div>
               <?php
                  unset($_SESSION["msg"]);
               }
               
            ?>
     <form action="updatecart.php" method="get">
      <table class="table table-border">
        <tr>
            <th>Delete</th>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
     
<?php
    $total_price  = 0;
    if (!empty($_SESSION["mycart"])) {
        $i = 0;
       
        $convert_string = implode(",",$_SESSION["mycart"]);
        $execute_query = mysqli_query($conn,"SELECT * FROM `products` WHERE `pr_id`IN ($convert_string)");
        if (mysqli_num_rows($execute_query) > 0) {
           while($data = mysqli_fetch_array($execute_query)){
            echo "<tr>
                <td><a href='deletesingleitem.php?id=$data[0]&quantindex=$i' class='text-danger'><i class='fa fa-trash'></i></a></td>
                <td>$data[0]</td>
                <td>$data[1]</td>
                <td><img src='../../darkpan/upload/product/$data[3]' width=100 height=100/></td>
                <td>Rs $data[2]</td>
                <input type ='hidden' name='quan_index[]' value='$i'/>
                <td><input type='number' value='".$_SESSION["quan"][$i]."' name='q".$i."' class='form-control'/></td>
                <td>Rs ".number_format($data[2] * $_SESSION["quan"][$i])."</td>
               
            </tr>";
            $total_price =  ($data[2] * $_SESSION["quan"][$i]) + $total_price;
            $i++;

           
           }
          echo "<tr>
          <td><a href='clearcart.php' class='btn btn-danger'>Clear Cart</a>
          <a href='checkout.php' class='btn btn-success'>Checkout</a>
         <button type='submit' class='btn btn-warning' name='btn'>Update</button></td>
           <td colspan='6' style='text-align:right'>Rs. ".number_format($total_price,0)."</td>
       </tr>";
        } 
        $_SESSION["totalPrice"] = $total_price;
    }
    else { ?>
        <tr>
          <td colspan="7" class="text-center text-danger">Cart is Empty</td>
        </tr>
     <?php }

?>
 </table>
 </form>
<?php
      include('footer.php');
      ?>
       <!-- ##### All Javascript Files ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
</body>
</html>