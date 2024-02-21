<?php
require '../assets/vendor/PHPMailer/src/PHPMailer.php';
require '../assets/vendor/PHPMailer/src/SMTP.php';
require '../assets/vendor/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = array();

try {
    $mail = new PHPMailer(true);

    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sonikakurmi48@gmail.com';
    $mail->Password = 'plxkpmsecwsujvzt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set common sender details
    $mail->setFrom('sonikakurmi48@gmail.com', 'Sonika Kurmi');

    // Send first email to user
    $toMail = isset($_POST['email']) ? $_POST['email'] : 'sona8821870295@gmail.com';
    $toName = isset($_POST['name']) ? ucwords($_POST['name']) : 'User';

    $mail->addAddress($toMail, $toName);
    $mail->isHTML(true);
    $mail->Subject = 'Thank You for Contacting Me';
    $mail->Body = "
        <div style='color: white;'>
            <p>Hello $toName,</p>
            <p>Thank you for reaching out to me! I'm glad you took the time to contact me through my website.</p>
            <p>Your message means a lot, and I appreciate the opportunity to connect with you. I'll do my best to respond to your inquiry as soon as possible.</p>
            <p>In the meantime, feel free to explore more of my website. If you have any further questions or need assistance, don't hesitate to ask.</p>
            <p>Thanks again for getting in touch. I'm looking forward to speaking with you soon!</p>
            <p>Best Regards,<br>
            Sonika Kurmi<br>
            Backend Developer<br>
            <a href='mailto:sonikakurmi48@gmail.com'>sonikakurmi48@gmail.com</a>
            </p>
            <img src='https://t3.ftcdn.net/jpg/01/32/12/26/360_F_132122695_cNuq5ACUnfSfqmRgJSP1rRiGVHdVedl6.webp' alt='Thank You Image'>
        </div>";

    $mail->send();

    // Send second email to Sonika with user's message
    $mail->clearAddresses(); // Clear previous recipient
    $mail->addAddress('sonikakurmi48@gmail.com', 'Portfolio Contact');
    $mail->Subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';
    $mail->Body = "
        <div style='color: white;'>
            <p>Hello Sonika,</p>
            <p>My name is $toName.</p>
            <p>" . trim($_POST['message']) . "</p>
            <p>Thanks again for getting in touch. I'm looking forward to speaking with you soon!</p>
            <p>Best Regards,<br>
            $toName,<br>
            $toMail</p>
        </div>";

    $mail->send();

    // Response for successful sending
    $response['status'] = 200;
    $response['message'] = 'Your message has been sent. Thank you!';
} catch (Exception $e) {
    // Response for error
    $response['status'] = 400;
    $response['message'] = 'Something went wrong. Please try again later.';
}

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
