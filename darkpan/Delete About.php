<?php

$ab_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `about` WHERE `abt_id`= '{$ab_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show About.php"
                            </script>';

?>


            




            