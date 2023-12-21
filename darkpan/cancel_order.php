<?php
// Retrieve the order ID and user email from the URL parameters
$orderId = $_GET['orderid'];
$userEmail = $_GET['email'];

// Delete the order from the database (you should add proper error handling and security measures)
$query = "DELETE FROM cart WHERE cart_id = $orderId";
$result = mysqli_query($conn, $query);

if ($result) {
    // Send an email to the user
    $to = $userEmail;
    $subject = 'Order Cancellation';
    $message = "Dear $orderedBy,\n\nYour order has been cancelled due to some issues. If you want to order the product again, please visit our website.\n\nBest regards,\nThe Plant Nest Team";
    $headers = 'From: your_email@example.com' . "\r\n" .
               'Reply-To: your_email@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    // Redirect back to the main page or perform other actions as needed
    header("Location: index.php");
    exit();
} else {
    echo 'Error: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
