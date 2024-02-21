<?php
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/PHPMailer.php');
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/SMTP.php');
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);
$response = array();

try {

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'sonikakurmi48@gmail.com';
  $mail->Password = 'plxkpmsecwsujvzt';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;


  $mail->setFrom('sonikakurmi48@gmail.com', 'Sonika Kurmi');
  $toMail = isset($_POST['email']) ? $_POST['email'] : 'sona8821870295@gmail.com';
  $toName = isset($_POST['name']) ? ucwords($_POST['name']) : 'User';

  $mail->addAddress($toMail, $toName);


  $mail->isHTML(true);
  $mail->Subject = 'Thank You for Contacting Me';

  $madBody = "
  <div style='color: white;'>
    <p>Hello " . $toName . ",</p>
    
    <p>Thank you for reaching out to me! I'm glad you took the time to contact me through my website.</p>
    
    <p>Your message means a lot, and I appreciate the opportunity to connect with you. I'll do my best to respond to your inquiry as soon as possible.</p>
    
    <p>In the meantime, feel free to explore more of my website. If you have any further questions or need assistance, don't hesitate to ask.</p>
    
    <p>Thanks again for getting in touch. I'm looking forward to speaking with you soon!</p>
    
    <p>Best Regards,<br>
    Sonika Kurmi<br>
    Backend Developer<br>
    <a href='mailto:sonikakurmi48@gmail.com'>sonikakurmi48@gmail.com</a></p>
    <img src='https://t3.ftcdn.net/jpg/01/32/12/26/360_F_132122695_cNuq5ACUnfSfqmRgJSP1rRiGVHdVedl6.webp' alt='Thank You Image'>
    </div>
  ";

  $mail->Body = $madBody;


  $mail->send();
  $response['status'] = 200;
  $response['message'] = 'Email has been sent successfully!';
} catch (Exception $e) {
  $response['status'] = 400;
  $response['message'] = 'Oops! Something went wrong. Please try again later.';
}

header('Content-Type: application/json');
echo json_encode($response);
