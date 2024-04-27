<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGeeeeE</title>
    <link rel="stylesheet" href="style9.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <a href="login.php?service=index.html">  <img src="CREATIVE.png" alt="Company Logo" style="height: 50px; width: 200px; float: left;"></a>
        <h1>Computer Repair Services</h1>
        <div class="login">
          <div class="rede">  <a href="login.php">Deconnexion</a></div>
        </div>
    </header>
    <div class="link">
        <nav>
            <a href="product.php">Add a product</a>
        </nav>
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

        // Retrieve and display information from the 'repair' table
        $sql_repair = "SELECT * FROM repair";
        $result_repair = $conn->query($sql_repair);

        if ($result_repair->num_rows > 0) {
            echo "<h2>Repair Information</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Date Submitted</th><th>Full Name</th><th>Email</th><th>Device</th><th>Other</th><th>Device Name</th><th>Device Model</th><th>Specification</th><th>Issues</th><th>Pictures</th><th>Code</th><th>Meeting Count</th><th>MEETING TIME</th></tr>";
            $rowCount = 0;
            while($row = $result_repair->fetch_assoc()) {
                if ($rowCount < 10) {
                    echo "<tr><td>".$row["date"]."</td><td>".$row["fullname"]."</td><td>".$row["email"]."</td><td>".$row["device"]."</td><td>".$row["other"]."</td><td>".$row["devicename"]."</td><td>".$row["devicemodel"]."</td><td>".$row["specification"]."</td><td>".$row["issues"]."</td><td><img src='C:\wamp\www\project\uploads;base64,".base64_encode($row['pictures'])."' /></td><td>".$row["code"]."</td><td>".$row["meeting_count"]."</td><td>".$row["meeting_time"]."</td></tr>";
                } else {
                    echo "<tr class='hidden'><td>".$row["date"]."</td><td>".$row["fullname"]."</td><td>".$row["email"]."</td><td>".$row["device"]."</td><td>".$row["other"]."</td><td>".$row["devicename"]."</td><td>".$row["devicemodel"]."</td><td>".$row["specification"]."</td><td>".$row["issues"]."</td><td><img src='C:\wamp\www\project\uploads;base64,".base64_encode($row['pictures'])."' /></td><td>".$row["code"]."</td><td>".$row["meeting_count"]."</td></tr>";
                }
                $rowCount++;
            }
            echo "</table>";
            if ($rowCount > 10) {
                echo "<button onclick='showMore()'>Show More</button>";
            }
        } else {
            echo "0 results found in the 'repair' table";
        }
        // Retrieve and display information from the 'meetings' table
        $sql_meetings = "SELECT * FROM meetings";
        $result_meetings = $conn->query($sql_meetings);

        if ($result_meetings->num_rows > 0) {
            echo "<h2>Meetings Information</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Date Submitted</th><th>hard1</th><th>hard2</th><th>hard3</th><th>hard4</th><th>hard5</th><th>soft1</th><th>soft2</th><th>soft3</th><th>soft4</th><th>soft5</th><th>Date scheduled</th><th>code</th><th>email</th></tr></th></tr>";
            $rowCount = 0;
            while($row = $result_meetings->fetch_assoc()) {
                if ($rowCount < 10) {
                    echo "<tr><td>".$row["date"]."</td><td>".$row["h1"]."</td><td>".$row["h2"]."</td><td>".$row["h3"]."</td><td>".$row["h4"]."</td><td>".$row["h5"]."</td><td>".$row["s1"]."</td><td>".$row["s2"]."</td><td>".$row["s3"]."</td><td>".$row["s4"]."</td><td>".$row["s5"]."</td><td>".$row["ms"]."</td><td>".$row["code"]."</td><td>".$row["email"];
                } else {
                    echo "<tr class='hidden'><td>".$row["date"]."</td><td>".$row["h1"]."</td><td>".$row["h2"]."</td><td>".$row["h3"]."</td><td>".$row["h4"]."</td><td>".$row["h5"]."</td><td>".$row["s1"]."</td><td>".$row["s2"]."</td><td>".$row["s3"]."</td><td>".$row["s4"]."</td><td>".$row["s5"]."</td><td>".$row["ms"]."</td><td>".$row["code"]."</td><td>".$row["email"];
                }
                $rowCount++;
            }
            echo "</table>";
            if ($rowCount > 10) {
                echo "<button onclick='showMore()'>Show More</button>";
            }
        } else {
            echo "0 results found in the 'meetings' table";
        }


        $conn->close();
        ?>


        <script>
            function showMore() {
                var hiddenRows = document.querySelectorAll('tr.hidden');
                hiddenRows.forEach(row => {
                    row.classList.toggle('hidden');
                });
            }
        </script>
        <a href="login.php">Return</a>
    </div>
</div>

</body>
</html>
