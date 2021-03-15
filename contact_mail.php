<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';
// require 'config.php'; database connection

$success = $success2 = $error = '';

if(isset($_POST['csend']) && isset($_POST['cname']) && isset($_POST['cemail']) && isset($_POST['ctext'])){

  $name = $_POST['cname'];
  $email = $_POST['cemail'];
	$message = $_POST['ctext'];

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'mup.webdev@gmail.com';                     // SMTP username
	    $mail->Password   = '11webdev11';                               // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom($email);
	    $mail->addAddress('mup.webdev@gmail.com');                                     // Add a recipient
      $mail->addAddress('mup.pabel1212@gmail.com');

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = "$name contacted via contact form.";
	    $mail->Body    = "<p><b>Name :</b> $name <br><b>Email :</b> $email <br><b>Message :</b> $message</p>";
	    $mail->AltBody = "Name : $name Email : $email Message : $message";

	    $mail->send();

      $success = "Thank you '$name' for contacting.";
      $success2 = "I will get back to you shortly.";
	} catch (Exception $e) {
	    $error = "Email could not be sent. Please contact the owner to this email 'mup.pabel1212@gmail.com' Mailer Error: {$mail->ErrorInfo}";
	}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <!-- Font Awesome Icon CDN -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

         <link rel="icon" type="image/png" href="assets/img/MUP1.png">
        <title>Mohi Uddin Pabel</title>
    </head>
  </head>
  <body>
    <div style="display: grid; place-items: center;">
      <br>
      <br>
      <h2><?php echo $success; ?></h2>
      <h3><?php echo $error; ?></h3>
      <p><?php echo $success2; ?></p>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <a href="index.html" class="button"><i class="fas fa-arrow-circle-left"></i>&nbsp;Go Back</a>
    </div>
  </body>
</html>
