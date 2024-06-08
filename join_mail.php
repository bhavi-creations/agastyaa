<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables

    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $fathername = $_POST['fathername'] ?? '';
    $mothername = $_POST['mothername'] ?? '';
    $occupation = $_POST['occupation'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $adhar = $_POST['adhar'] ?? '';
    $email = $_POST['email'] ?? '';
    $group = $_POST['group'] ?? '';
    $presentschool = $_POST['presentschool'] ?? '';
    $address = $_POST['address'] ?? '';
    $message = $_POST['message'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ' @gmail.com'; // Your Gmail email address
        $mail->Password = ' '; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom(' @gmail.com', 'Agastya'); // Your Gmail email and name
        $mail->addAddress(' @gmail.com', 'Agastya'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message for Joining';
        $mail->Body = "
            <h1>New Message</h1>
            <p><strong>First  Name:</strong> $firstname</p>
            <p><strong>Last Name:</strong> $lastname</p>
            <p><strong>Father Name:</strong> $fathername</p>
            <p><strong>Mother Name:</strong> $mothername</p>
            <p><strong>Occupation:</strong> $occupation</p>
            <p><strong>D.O.B:</strong> $dob</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Adhar Num.:</strong> $adhar</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Group:</strong> $group</p>
            <p><strong>Present School:</strong> $presentschool</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="index.html";</script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
