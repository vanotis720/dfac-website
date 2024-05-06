<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'contact@dfacdrc.com';

    $subject = 'Site web DFAC - Nouveau message de ' . $name;

    $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $email_content = "Nom : $name\n";
    $email_content .= "Adresse email: $email\n\n";
    $email_content .= "Message :\n$message\n";

    mail($to, $subject, $email_content, $headers);

    echo 'success';
} else {
    echo 'error';
}
