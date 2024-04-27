<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateCode = $_POST["updateCode"];
    $updateFunctionality = $_POST["updateFunctionality"];
    $updateProblem = $_POST["updateProblem"];
    $updateStatus = $_POST["updateStatus"];

    // Update data in admine table
    $sql_update_admine = "UPDATE admine SET functionality='$updateFunctionality', problem='$updateProblem', status='$updateStatus' WHERE code='$updateCode'";
    if ($conn->query($sql_update_admine) === TRUE) {
        $updateMessage = "<h4><font color=blue>Update successful</font></h4> ";
    } else {
        $updateMessage = "Error updating record in admine table: " . $conn->error;
    }

    // Update data in admine1 table
    $sql_update_admine1 = "UPDATE admine1 SET functionality='$updateFunctionality', problem='$updateProblem', status='$updateStatus' WHERE code='$updateCode'";
    if ($conn->query($sql_update_admine1) === TRUE) {
        $updateMessage .= "<br>";
    } else {
        $updateMessage .= "<br>Error updating record in admine1 table: " . $conn->error;
    }

    echo $updateMessage;
}

$conn->close();
?>
<html>
    <title>
        Update
    </title>
    <link rel="stylesheet" href="style12.css">
    <body>
        <a href="product.php">Return</a>
    </body>
</html>