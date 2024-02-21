<?php
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/PHPMailer.php');
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/SMTP.php');
require('C:/xampp/htdocs/mee/assets/vendor/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);


try {

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'sonikakurmi48@gmail.com';
  $mail->Password = 'plxkpmsecwsujvzt';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;


  $mail->setFrom('sonikakurmi48@gmail.com', 'Sonika Kurmi');
  $mail->addAddress(isset($_POST['email']) ?? 'sona8821870295@gmail.com', isset($_POST['name']) ?? 'Users');


  $mail->isHTML(true);
  $mail->Subject = 'Thank You for Contacting Me';


  $mail->Body = 'Sonika test This is the HTML message body';


  $mail->send();
  echo 'Email has been sent successfully';
} catch (Exception $e) {
  echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

<pre>

Hello <?php isset($_POST['name']) ?? 'Users' ?>,

Thank you for reaching out to me! I'm glad you took the time to contact me through my website.

Your message means a lot, and I appreciate the opportunity to connect with you. I'll do my best to respond to your inquiry as soon as possible.

In the meantime, feel free to explore more of my website. If you have any further questions or need assistance, don't hesitate to ask.

Thanks again for getting in touch. I'm looking forward to speaking with you soon!

Best Regards,
Sonika Kurmi
Backend Developer
sonikakurmi48@gmail.com

</pre>
// }
