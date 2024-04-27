<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

function sendEmail($to, $subject, $message)
{
    $transport = new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
    $transport->setUsername('blinglisa830@gmail.com'); // Remplacez par votre adresse Gmail
    $transport->setPassword('u r k c a h q c t y u d k j b z'); // Remplacez par votre mot de passe d'application

    $mailer = new Swift_Mailer($transport);

    $email = (new Swift_Message($subject))
        ->setFrom(['blinglisa830@gmail.com' => 'JOJO']) // Remplacez par votre nom et votre adresse e-mail
        ->setTo($to)
        ->setBody($message)
        ->setContentType('text/html');

    try {
        $result = $mailer->send($email);
        if ($result) {
            echo 'E-mail envoyé avec succès';
        } else {
            echo 'Échec de l\'envoi de l\'e-mail';
        }
    } catch (Exception $e) {
        echo "Impossible d'envoyer le message. Erreur du service d'envoi de courrier : " . $e->getMessage();
    }
}
?>
