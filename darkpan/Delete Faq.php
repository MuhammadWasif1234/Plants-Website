<?php

$fq_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `faq` WHERE `fq_id`= '{$fq_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Faq.php"
                            </script>';

?>


            




            