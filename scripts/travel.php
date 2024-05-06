<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $destination = $_POST['destination'];
    $visa_type = $_POST['visa_type'];

    $to = 'dfac_travel.a@dfacdrc.com';

    $subject = 'Site web DFAC - Nouveau message de ' . $name;

    $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $email_content = "Nom : $name\n";
    $email_content .= "Adresse email: $email\n\n";
    $email_content .= "Téléphone : $phone\n\n";
    $email_content .= "Déstination :\n$destination\n";
    $email_content .= "Type de visa :\n$visa_type\n";

    mail($to, $subject, $email_content, $headers);

    echo 'success';
} else {
    echo 'error';
}
