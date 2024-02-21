<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email information
    $to = "sonikakurmi48@example.com"; 
    $subject = "New Form Submission";
    $body = "Name: $name\nEmail: $email\n\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
// }
?>
