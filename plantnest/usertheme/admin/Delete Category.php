<?php

$cat_id = $_GET["id"];

include "config.php";


$query = "DELETE FROM `category` WHERE `cate_id`= '{$cat_id}'";

mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                            window.location.href="Show Category.php"
                            </script>';

?>