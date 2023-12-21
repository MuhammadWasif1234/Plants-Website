<?php

$fb_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `feedback` WHERE `fb_id`= '{$fb_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Feed.php"
                            </script>';

?>


            




            