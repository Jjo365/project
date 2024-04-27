
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
  
function enregistrer_un_contact(){
    global  $name, $surname, $email, $contact, $message;
    try
    {

        include("connexionvb.php");
       $sql="INSERT INTO users (name, surname, email, contact, message) VALUES (:na, :sur, :em, :con, :mes)";
          $sql=$db->prepare($sql);
       $sql->bindvalue(':na', $name);
       $sql->bindvalue(':sur', $surname);
       $sql->bindvalue(':em', $email);
       $sql->bindvalue(':con', $contact);
       $sql->bindvalue(':mes', $message);
       $sql->execute();
       if($sql){
          echo "<h4><font color=blue>THANK YOU!</font></h4>"; 
           // Send email to user
           $to = $email;
$subject = "Thank you for contacting us";
$message1 = "Dear $name,\n\nThank you for contacting Computer Repair Services. We have received your message and will get back to you as soon as possible.\n\nBest regards,\nComputer Repair Services";
$headers = "From: blinglisa830@gmail.com";
// Enable TLS encryption
ini_set("smtp_tls", "tls");
// Set the SMTP server and port with encryption
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "blinglisa830@gmail.com");
ini_set("sendmail_path", "C:\wamp\bin\sendmail\sendmail.exe -t -i");



if (mail($to, $subject, $message1, $headers)) {
    echo "<h4><font color=blue>Email sent successfully!</font></h4>";
} else {
    echo "<h4><font color=red>Email sending failed. Please check your settings.</font></h4>";
}

       }else{
           echo"<h4><font color=red>Echec d'insertion</font></h4>";
       }
       $sql->closecursor();
    }
    catch(Exception $e)
    {
       die('Erreur:'.$e->getMessage());
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
