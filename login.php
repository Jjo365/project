<?php
function recuperer_un_contact(){
    global $db, $username, $password;

    try {
        include("connexionvb.php");
        
        $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            // User authenticated, set session variables and redirect
            session_start();
            $_SESSION['username'] = $username;

            // Check if "Remember Me" option is selected
            if(isset($_POST['remember'])){
                // Set a cookie with the username and password
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }

            // Display welcome notification
            echo "<div class='notification success'>WELCOME</div>";

            // Check if the user is an administrator
            $isAdmin = false;
            $adminUsernames = array("jojo", "bond", "lin"); // Add the usernames of administrators here

            if(in_array($username, $adminUsernames)){
                $isAdmin = true;
            }

            if($isAdmin){
                // Redirect the administrator to a different page
                header("Location: admin_dashboard.php");
            } else {
                // Redirect regular users to a different page
                header("Location: admin.php");
            }
            exit;
        } else {
            // Display authentication failed notification
            echo "<div class='notification error'>Authentication Failed</div>";
        }
        
        $stmt->closeCursor();
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($_POST['btnsubmit'])) {
    recuperer_un_contact();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style3.css">
    <style>
        .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            margin-bottom: 500px;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            margin-right: -250px;
        }

        .success {
            background-color: #4CAF50;
        }

        .error {
            background-color: #f44336;
        }

        .notification .close {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form name="loginForm" action="#" method="POST" onsubmit="return validateForm()">
    <center><h2>Sign-in</h2></center>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="btnsubmit">Login</button>
        <p>Don't have an account? <a href="create.php">Create one</a></p>
        <a href="index.html">Return to website</a>
    </form>
</body>
<script>
function validateForm() {
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (username === "" || password === "") {
        alert("Username and Password must be filled out");
        return false;
    }
}
</script>
</html>
