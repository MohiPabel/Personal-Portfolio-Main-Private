<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';
// require 'config.php'; database connection

$success = $success2 = $error = '';

if(isset($_POST['modalSend']) && isset($_POST['modalMail'])){

	$emailTo = $_POST['modalMail'];

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
	    $mail->setFrom('mup.webdev@gmail.com', 'Mohi Pabel');
	    $mail->addAddress($emailTo);                                     // Add a recipient
      $mail->addAddress('mup.pabel1212@gmail.com', "Sent to $emailTo");
	    $mail->addReplyTo('no-reply@mail.com', 'No reply');

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Resume - Mohi Uddin Pabel';
	    $mail->Body    = "<body style='color: #eceff1; font-size: 16px; text-decoration: none; font-family: Helvetica, Arial, sans-serif; background-color: #263238;'>

	  <div id='wrapper' style='max-width: 600px; margin: auto auto; padding: 20px;'>

	    <div id='hr'>
	      <hr style='border: 1px solid #8b8f90;'>
	    </div>

	    <div id='message'>
	      <h1>Hello, </h1>

	      <p style='font-size: 20px; text-align: center;'>Thank you for visiting my website. Here is a copy of my resume given below as an attachment.</p>



	      <p style='font-size: 12px; padding: 16px 0px;'>If you didn't request this, please ignore this email.</p>

	      <p>Thank you,</p>
	      <p>Mohi Uddin Pabel</p>
	    </div>

	    <div id='hr'>
	      <hr style='border: 1px solid #8b8f90;'>
	    </div>

	    <center id='footer'>

	      <div style='line-height: 2px;'>
	        <p>© Mohi Uddin Pabel</p>
	      </div>


	      <div id='hr'>
	        <hr style='border: 0.1px transparent #95999a;'>
	      </div>

	      <p style='color: #95999a;'>This eamil service is delivered by PHPMailer.</p>

	    </center>

	  </div>

	</body>";
	    $mail->AltBody = 'Thank you for visiting my website. Here is a copy of my resume given below as an attachment.';
			$mail->AddAttachment('assets\Mohi Uddin Pabel - Resume.pdf', 'Mohi Uddin Pabel - Resume.pdf');

	    $mail->send();

      $success = "Resume has been sent to your email";
      $success2 = "Please check your spam folder if you don't receive it right away or wait for a while.";
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
      <h3><?php echo $success; ?></h3>
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
