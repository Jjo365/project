<?php
function enregistrer_un_user(){
    global  $username, $password;
    try
    {
        include("connexionvb.php");
        $sql="SELECT * FROM admin WHERE username = :nam";
        $stmt = $db->prepare($sql);
        $stmt->bindvalue(':nam', $username);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            echo "<h4><font color=red>Username already exists!</font></h4>";
        } else {
            if(strlen($password) < 8 || !preg_match('/[A-Z]/', $password)){
                echo "<h4><font color=red>Password must be at least 8 characters long and contain at least 1 uppercase letter!</font></h4>";
            } else {
                $sql="INSERT INTO admin (username, password) VALUES (:nam, :surp)";
                $sql=$db->prepare($sql);
                $sql->bindvalue(':nam', $username);
                $sql->bindvalue(':surp', $password);
                $sql->execute();
                if($sql){
                    echo "<h4><font color=blue>ACCOUNT CREATION SUCCESSFUL!</font></h4>"; 
                } else {
                    echo "<h4><font color=red>Insertion failed</font></h4>";
                }
                $sql->closecursor();
            }
        }
    }
    catch(Exception $e)
    {
        die('Error:'.$e->getMessage());
    }
}

$username = "";
$password = "";

if(isset($_POST['username'])) {
    $username = $_POST['username'];
}
if(isset($_POST['password'])) {
    $password = $_POST['password'];
}

if(isset($_POST['btnsubmit'])) {
    enregistrer_un_user();
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account creation</title>
    <link rel="stylesheet" href="styles4.css">
</head>

<body>

<form action="#" method="post">
<center><h2>Sign-up</h2></center>
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" placeholder="enter your username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" placeholder="enter your password"><br>
    
    <input type="submit" name="btnsubmit" value="Sign-up">
    <a href="index.html">Return to website</a><br><a href="login.php">Return to login</a>
</form>
</body>
</html>
