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

    $mail->Username = "digiscamofficial@gmail.com";
    $mail->Password = "DIGISCAMPRO";

    $mail->setFrom("digiscamofficial@gmail.com");
    $mail->addReplyTo("no-reply@digiscam.com");

    // recipient
    