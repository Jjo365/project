<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$message = $_POST['message'];

$sql = "INSERT INTO users (name, surname, email, contact, message) VALUES ('$name', '$surname', '$email', '$contact', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php include 'contact.php'; ?>

