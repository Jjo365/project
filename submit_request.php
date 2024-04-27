

<?php
    function enregistrer_un_form(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

$sql = "INSERT INTO repair (date, fullname, address, device, other, devicename, devicemodel, specifications, issues, picture) 
        VALUES ('$date', '$fullname', '$address', '$device', '$other', '$devicename', '$devicemodel', '$specifications', '$issues', '$picture')";

if ($conn->query($sql) === TRUE) {
    echo "Request submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
