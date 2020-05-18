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
    $mail->Password = "";

    $mail->setFrom("armondkjoy@gmail.com");
    $mail->addReplyTo("no-reply@armondkjoy.com");

    // recipient
    $mail->addAddress("armondkjoy@gmail.com");
    $mail->isHTML();
    $mail->Subject = "Sending from localhost";
    $mail->Body = "
                    <div style='color: blue;font-size: 20px;background-color:grey;'>
                        Thank you buddy!!!
                    </div>
                ";

    if($mail->send()) {
        echo "Email sent";
    } else {
        echo "Sorry somethings wrong";
    }