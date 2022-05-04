<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    $headers = "From:" . $from;

    $mail = new PHPMailer();
    $mail->IsSMTP();                                          // SMTP-n keresztuli kuldes
    $mail->Host     = 'smtp.rackhost.hu';                     // SMTP szerverek
    $mail->SMTPAuth = true;                                   // SMTP

    $mail->Username = 'mail@mrflowshop.hu';                   // SMTP felhasználo
    $mail->Password = 't6WjgCKX4dxu3Md';                      // SMTP jelszo

    $mail->From     = $_POST['email'];                        // Felado e-mail cime
    $mail->FromName = $_POST['name'];                         // Felado neve
    $mail->AddAddress('info@mrflow.hu', 'Székely Flórián');   // Cimzett es neve

    $mail->WordWrap = 80;                                     // Sortores allitasa

    $mail->Subject = $_POST['subject'];                       // A level targya
    $mail->Body = $_POST['message'];                          // A level szoveges tartalma

    if(!$mail->Send()) {   
        header('Location: https://mrflow.hu/?error=true');
    } else {
        header('Location: https://mrflow.hu/?success=true');
    }