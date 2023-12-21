<?php
    session_start();
    unset($_SESSION["mycart"]);
    unset($_SESSION["quan"]);

    header("location: shop.php")


?>