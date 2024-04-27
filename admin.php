<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Repair Services management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('img4.avif');
            background-size: cover;
            background-repeat: no-repeat;
            animation: slide 20s infinite;
        }

        @keyframes slide {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="index.html">  <img src="CREATIVE.png" alt="Company Logo" style="height: 50px; width: 200px; float: left;"></a>
        <h1>CLIENT PAGE</h1>
         <div class="login">
          <div class="red">  <a href="login.php">Deconnection</a></div>
        </div>
    </header>
    <div class="link">
        <nav>
            <a href="status.php">STATUS</a>
        </nav>
    </div>
    <header class="header">
        <section>
            <p class="noir" style="margin-top: -250px;">Welcome to Our Computer Repair Services</p>
            <p>Welcome to the client page here below and the different forms for you to fill when needed</p>
            <button type="submit" style="width: 18rem;" style="margin-top: 250px;"><a href="repair.php">REPAIR</button>
            <button type="reset" style="width: 18rem;"><a href="maintenance.php">MAINTENANCE</button>
        </section>
    </header>
</body>

</html>
