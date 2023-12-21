<?php

$con_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `contact` WHERE `con_id`= '{$con_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Contact.php"
                            </script>';

?>


            




            