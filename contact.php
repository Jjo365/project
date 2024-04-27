
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Repair Services</title>
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <header>
    <a href="index.html">  <img src="CREATIVE.png" alt="Company Logo" style="height: 50px; width: 200px; float: left;"></a>
        <h1>Computer Repair Services</h1>
        <div class="login">
          <div class="rede">  <a href="login.php">Login</a></div>
        </div>
    </header>
<div class="link">
    <nav>
        <a href="index.html">Home</a>
        <a href="services.html">Services</a>
        <a href="contact.php">Contact</a>
    </nav>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <style>
        .contact-info {
            border: 1px solid #ccc;
            padding: 10px;
            width: 200px;
            float: left;
            margin-right: 20px;
        }
    </style>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enregistrer_un_contact()
{
    global $name, $surname, $email, $contact, $message;
    
    require 'vendor/autoload.php'; // Chemin vers le fichier autoload.php de PHPMailer
    
    $mail = new PHPMailer(true); // Création d'une nouvelle instance de PHPMailer
    
    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'your-email@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'your-password'; // Remplacez par votre mot de passe

        // Paramètres de l'e-mail
        $mail->setFrom('your-email@gmail.com', 'Computer Repair Services'); // Remplacez par votre adresse e-mail et nom d'envoi
        $mail->addAddress($email, $name); // Adresse e-mail et nom du destinataire
        $mail->Subject = 'Merci de nous avoir contactés'; // Sujet de l'e-mail
        
        // Corps de l'e-mail
        $mail->Body = "Cher $name,\n\nMerci de nous avoir contactés. Nous avons bien reçu votre message et nous vous répondrons dès que possible.\n\nCordialement,\nComputer Repair Services";
        
        // Envoi de l'e-mail
        $mail->send();
        
        echo "<h4><font color='blue'>Merci !</font></h4>";
        echo "<h4><font color='blue'>E-mail envoyé avec succès !</font></h4>";
    } catch (Exception $e) {
        echo "<h4><font color='red'>Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo . "</font></h4>";
    }
}



$name = "";
$surname = "";
$email = "";
$contact = "";
$message = "";

if(isset($_POST['name'])) {
    $name = $_POST['name'];
}
if(isset($_POST['surname'])) {
    $surname = $_POST['surname'];
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
}
if(isset($_POST['contact'])) {
    $contact = $_POST['contact'];
}
if(isset($_POST['message'])) {
    $message = $_POST['message'];
}

if(isset($_POST['btnsubmit'])) {
   enregistrer_un_contact();
}

?>


</head>
<body>
    <div class="contact-info">
        <h3>Company Contact Information</h3>
        <p>Address: 123 Company St, City</p>
        <p>Phone: 123-456-7890</p>
        <p>Email: info@company.com</p>
        <p>Note: Leave us your contact information so we can update you.</p>
    </div>

    <div class="contact-form">
        <h2>Contact Us</h2>
        <form method="post" action="contact.php">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br><br>

            <label for="surname">Surname:</label><br>
            <input type="text" id="surname" name="surname"><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br><br>

            <label for="contact">Contact:</label><br>
            <input type="text" id="contact" name="contact"><br><br>

            <label for="message">Message:</label><br>
            <textarea id="message" name="message"></textarea><br><br>

            <input type="submit" name="btnsubmit" value="Submit">

        </form>
    </div>
</body>
<footer>
        &copy; 2024 Computer Repair Services
    </footer>
</body>
</html>
