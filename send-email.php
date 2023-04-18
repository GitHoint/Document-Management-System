<?php
    //Used for 2fa & password reset emails
    session_start();
    if ($_POST["email"] == null)
    {
        $email = $_SESSION["email"];
        $message = $_SESSION["message"];
        $subject = $_SESSION["subject"];
    }
    else
    {
        $email = $_POST["email"];
        $message = $_POST["message"];
        $subject = $_POST["subject"];
        $_SESSION["email-to-reset"] = $_POST["email"];
    }
    $return = $_SESSION["return"];

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->isHTML(true);

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "system.kwh@gmail.com";
    $mail->Password = "ikqqggbvcqyvkimw";

    $mail->setFrom("system@kwh.com", "System Notification :: Kuwait Finance House");
    $mail->addAddress($email);

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    header("Location: $return");

?>