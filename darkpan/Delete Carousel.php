<?php

$car_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `carousel` WHERE `cr_id`= '{$car_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Carousel.php"
                            </script>';

?>


            




            