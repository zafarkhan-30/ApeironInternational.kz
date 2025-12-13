<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Only if using Composer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@lumierelogisticsfze.com'; // your email
        $mail->Password   = '6l/QTOQFV';           // email password
        $mail->SMTPSecure = 'ssl';                          // use SSL
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('info@lumierelogisticsfze.com', 'Apeiron International');
        $mail->addAddress('info@lumierelogisticsfze.com'); // Send to self or other

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <strong>Name:</strong> " . htmlspecialchars($_POST['name']) . "<br>
            <strong>Phone:</strong> " . htmlspecialchars($_POST['phone']) . "<br>
            <strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "<br>
            <strong>Subject:</strong> " . htmlspecialchars($_POST['subject']) . "<br>
            <strong>Message:</strong><br>" . nl2br(htmlspecialchars($_POST['message']));

        $mail->send();
        echo 'Message has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
