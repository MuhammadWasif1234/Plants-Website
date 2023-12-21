<?php

$sr_id = $_GET["id"];

include "config.php";

// Get the image name associated with the product
$query = "SELECT sr_img FROM services WHERE sr_id = '{$sr_id}'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $imageToDelete = $row["sr_img"];
    $imagePath = "upload/services/" . $imageToDelete;

    // Delete the image file
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Delete the row from the products table
$query = "DELETE FROM `services` WHERE `sr_id`= '{$sr_id}'";
mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                window.location.href="Show Service.php"
                </script>';
?>
