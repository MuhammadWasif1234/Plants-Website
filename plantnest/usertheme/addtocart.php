<?php
// 4
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
}

    if (isset($_POST["btn"])) {
        $id = $_POST["Pro_ID"];
        $qty = $_POST["quantity"];
    
        if (in_array($id,$_SESSION["mycart"] )) {
            $_SESSION["msg"] = "Product Already Added";
        } else {
            array_push($_SESSION["mycart"] , $id);
            array_push($_SESSION["quan"] , $qty);
    
            $_SESSION["msg"] = "Product Added";
        }
       header("location: shop.php");
    }


    
   

?>  