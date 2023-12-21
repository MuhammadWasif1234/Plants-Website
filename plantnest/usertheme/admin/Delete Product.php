<?php

$pro_id = $_GET["id"];

include "config.php";

// Get the image name associated with the product
$query = "SELECT pr_img FROM products WHERE pr_id = '{$pro_id}'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $imageToDelete = $row["pr_img"];
    $imagePath = "upload/product/" . $imageToDelete;

    // Delete the image file
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Delete the row from the products table
$query = "DELETE FROM `products` WHERE `pr_id`= '{$pro_id}'";
mysqli_query($conn, $query);

echo '<script>alert("Record Deleted successfully")
                window.location.href="Show Product.php"
                </script>';
?>
