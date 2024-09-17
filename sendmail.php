<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['message'])
    ) {
        // Sanitize input to prevent XSS
        $name = htmlspecialchars(trim($_POST["name"]));
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars(trim($_POST["phone"]));
        $message = htmlspecialchars(trim($_POST["message"]));

        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "thebandemail2023@hotmail.com";
            $subject = "New Contact Form Submission";
            $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nMessage: {$message}";
            $headers = "From: {$email}\r\n";
            $headers .= "Reply-To: {$email}\r\n";

            if (mail($to, $subject, $body, $headers)) {
                echo "Message sent successfully!";
            } else {
                echo "Failed to send message.";
            }
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>
