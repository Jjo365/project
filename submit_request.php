

<?php
  function enregistrer_un_form()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $date = $_POST['date'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $device = $_POST['device'];
        $other = $_POST['other'];
        $devicename = $_POST['devicename'];
        $devicemodel = $_POST['devicemodel'];
        $specifications = $_POST['specifications'];
        $issues = $_POST['issues'];
        $picture = $_FILES['picture']['name'];

        $stmt = $conn->prepare("INSERT INTO repair (date, fullname, address, device, other, devicename, devicemodel, specifications, issues, picture) 
                               VALUES (:date, :fullname, :address, :device, :other, :devicename, :devicemodel, :specifications, :issues, :picture)");

        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':device', $device);
        $stmt->bindParam(':other', $other);
        $stmt->bindParam(':devicename', $devicename);
        $stmt->bindParam(':devicemodel', $devicemodel);
        $stmt->bindParam(':specifications', $specifications);
        $stmt->bindParam(':issues', $issues);
        $stmt->bindParam(':picture', $picture);

        if ($stmt->execute()) {
            echo "Demande soumise avec succès";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} 

$conn->close();
$date = "";
$fullname = "";
$address = "";
$device = "";
$other = "";
$devicename = "";
$devicemodel = "";
$specifications = "";
$issues = "";
$picture = "";


if(isset($_POST['date'])) {
    $date = $_POST['date'];
}
if(isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
}
if(isset($_POST['address'])) {
    $address = $_POST['address'];
}
if(isset($_POST['device'])) {
    $cdevice = $_POST['device'];
}
if(isset($_POST['other'])) {
    $other = $_POST['other'];
}
if(isset($_POST['devicename'])) {
    $devicename = $_POST['devicename'];
}
if(isset($_POST['devicemodel'])) {
    $devicemodel = $_POST['devicemodel'];
}
if(isset($_POST['specifications'])) {
    $specifications = $_POST['specifications'];
}
if(isset($_POST['issues'])) {
    $issues = $_POST['issues'];
}
if(isset($_POST['picture'])) {
    $picture = $_POST['picture'];
}
if(isset($_POST['btnsubmit'])) {
   enregistrer_un_form();
}
    }
?>
