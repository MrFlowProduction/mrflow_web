<?php

  $to = "info@mrflow.hu";
  $from = $_POST['email'];
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = "From:" . $from;

  $result = mail($to,$subject,$message,$headers);
  
  if(!$result) {   
    header('Location: https://mrflow.hu/?error=true');
  } else {
    header('Location: https://mrflow.hu/?success=true');
  }

  $mail = new PHPMailer();

  // Settings
  $mail->IsSMTP();
  $mail->CharSet = 'UTF-8';

  $mail->Host       = "mail.example.com";    // SMTP server example
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "username";            // SMTP account username example
  $mail->Password   = "password";            // SMTP account password example

  // Content
  $mail->isHTML(true);                       // Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();