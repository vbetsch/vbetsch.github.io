<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    $file = '../secret.json';
    $json = json_decode(file_get_contents($file), true);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = $json["host"];
        $mail->SMTPAuth   = true;
        $mail->Username   = $json["user"];
        $mail->Password   = $json["password"];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress($json["address"]);

        //Content
        $mail->isHTML(false);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        $mail->send();
        header('Location: mail.html');
    } catch (Exception $e) {
        header('Location: mail-error.html');
    }
?>