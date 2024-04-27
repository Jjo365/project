<?php
$entered_code = isset($_POST['code']) ? $_POST['code'] : '';

function check_code(){
    global $entered_code;
    if(empty($entered_code)){
        echo "Code is required.";
        return;
    }
    
    try {
        include("connexionvb.php");

        // Check if the code exists in the repair table
        $sql = "SELECT code FROM repair WHERE code=:code";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':code', $entered_code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Code exists in the repair table, redirect to repair status page
            header("Location: status1.php?code=$entered_code");
            exit();
        } else {
            // Check if the code exists in the meetings table
            $sql = "SELECT code FROM meetings WHERE code=:code";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':code', $entered_code);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Code exists in the meetings table, redirect to maintenance status page
                header("Location: status2.php?code=$entered_code");
                exit();
            } else {
                // Code does not exist in any of the tables, deny access
                echo "Invalid code. Access denied.";
            }
        }
        $stmt->closeCursor();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_code();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATUS</title>
    <link rel="stylesheet" href="style7.css">
</head>
<body>
    <form id="codeForm" action="#" method="post">
        <label for="code">Enter Code:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit">Submit</button><br><br>
        <a href="admin.php">Return</a>
    </form>
</body>
</html>
