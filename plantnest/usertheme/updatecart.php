<?php
session_start();
if (isset($_GET["btn"])) {
    $indexwala = $_GET["quan_index"];
    foreach ($indexwala as $key) {
        $_SESSION["quan"][$key] = $_GET["q".$key];
    }
    $_SESSION["msg"]="Quantity Updated";
    header("location: viewcart.php");
} else {
    header("location: viewcart.php");
}

?>