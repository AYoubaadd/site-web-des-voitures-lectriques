<?php
session_start();
        echo "<script>
        prompt('Félicitations !! Vous allez recevoir un e-mail.ENTRER VOTRE ADDRESE ');
        
    </script>";

    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\Users\document\Downloads\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'C:\Users\document\Downloads\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\Users\document\Downloads\PHPMailer-master\PHPMailer-master\src\SMTP.php';



if (isset($_SESSION["email"])) {
    $recipientEmail = $_SESSION["email"];
echo $_SESSION["email"];
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'addichaneayoub@gmail.com';
        $mail->Password = 'stgpaszwdgpojfsb'; // Utilisez des variables d'environnement pour plus de sécurité
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Destinataire et expéditeur
        $mail->setFrom('addichaneayoub@gmail.com', 'Admin');
        $mail->addAddress($recipientEmail); // Destinataire

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Achat de voiture';
        $mail->Body    = 'Félicitations !! Demain matin, notre Emporium va livrer votre voiture à l\'adresse que vous nous avez donnée.';

        // Envoi de l'email
        $mail->send();
        echo "<script>
        
        document.location.href = 'Acceuil.php';
    </script>";
    } catch (Exception $e) {
        echo "L'email n'a pas pu être envoyé. Erreur Mailer: {$mail->ErrorInfo}";
    }
} else {
    echo "Aucune adresse email définie dans la session.";
}
?>
