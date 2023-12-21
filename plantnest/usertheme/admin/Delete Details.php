<?php

$dt_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `details` WHERE `dt_id`= '{$dt_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Details.php"
                            </script>';

?>


            




            