<?php
// Retrieve the order ID and user email from the URL parameters
$orderId = $_GET['orderid'];
$userEmail = $_GET['email'];

// Send an email to the user
$to = $userEmail;
$subject = 'Order Shipped';
$message = "Dear $orderedBy,\n\nYour order has been shipped to our warehouse. You will receive it in a few days.\n\nBest regards,\nThe Plant Nest Team";
$headers = 'From: your_email@example.com' . "\r\n" .
           'Reply-To: your_email@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    // Redirect back to the main page or perform other actions as needed
    header("Location: index.php");
    exit();
} else {
    echo 'Error sending email.';
}
?>
