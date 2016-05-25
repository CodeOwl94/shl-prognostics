<?php
require 'vendor/autoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mailInfo = file("../../../../logins/email.txt");

$mail->Username = $mailInfo[0];                 // SMTP username
$mail->Password = $mailInfo[1];                           // SMTP password

//TLS goes with 587 while SSL goes with 465
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'System Health Lab');
$mail->addAddress('ashwin.dcruz@uwa.edu.au', "Ashwin D'Cruz");     // Add a recipient               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>