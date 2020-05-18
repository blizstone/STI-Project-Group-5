<?php
    require_once("vendor/autoload.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->SMTPSecure = "ssl";

    $mail->Username = "armondkjoy@gmail.com";
    $mail->Password = "Armond@19";

    $mail->setFrom("armondkjoy@gmail.com");
    $mail->addReplyTo("no-reply@armondkjoy.com");
    $mail->isHTML();

    // recipient
 