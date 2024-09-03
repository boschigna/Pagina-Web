<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'boschandradei@sanmarcos.edu.ar'; 
    $subject = 'Nuevo mensaje de contacto';
    $body = "Nombre: $name\nEmail: $email\n\nMensaje:\n$message";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Verifica si el envío del correo fue exitoso
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
        error_log("Failed to send email. Headers: $headers Body: $body");
    }
}
?>
