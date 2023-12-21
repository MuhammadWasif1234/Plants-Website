<?php

$user_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `user` WHERE `usr_id`= '{$user_id}'";

mysqli_query($conn, $query);

echo '<script>
    alert("Record Deleted successfully")
    window.location.href="Show User.php"
 </script>';

?>


            




            