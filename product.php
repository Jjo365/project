<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Device Entry Form</title>
    <link rel="stylesheet" href="style10.css">
    <style>
        .orange {
            color: orange;
        }
        .green {
            color: green;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    // Code to insert/update data into the database
}

// Fetch data from admine table
$sql_select_admine = "SELECT * FROM admine WHERE status != 'Complete'";
$result_select_admine = $conn->query($sql_select_admine);

// Fetch data from admine1 table
$sql_select_admine1 = "SELECT * FROM admine1 WHERE status != 'Complete'";
$result_select_admine1 = $conn->query($sql_select_admine1);

$conn->close();
?>
<form action="#" method="POST">
    <label for="code">Enter Code:</label>
    <input type="text" id="code" name="code" required><br><br>
    <label for="functionality">Functionality:</label>
    <input type="text" id="functionality" name="functionality" required><br><br>
    <label for="problem">Problem:</label>
    <input type="text" id="problem" name="problem" required><br><br>
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option class="orange">In Repair</option>
        <option class="green">Complete</option>
    </select><br><br>
    <input type="submit" value="Submit">
    <input type="button" value="Update" onclick="showUpdateForm()">
</form>

<!-- Update form -->
<div id="updateForm" style="display: none;">
    <form action="update.php" method="POST">
        <h2>Update Information</h2>
        <!-- Input fields for updating data -->
        <label for="updateCode">Code:</label>
        <input type="text" id="updateCode" name="updateCode" required><br><br>
        <label for="updateFunctionality">Functionality:</label>
        <input type="text" id="updateFunctionality" name="updateFunctionality" required><br><br>
        <label for="updateProblem">Problem:</label>
        <input type="text" id="updateProblem" name="updateProblem" required><br><br>
        <label for="updateStatus">Status:</label>
        <select id="updateStatus" name="updateStatus" required>
            <option class="orange">In Repair</option>
            <option class="green">Complete</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
</div>

<!-- Display admine table -->
<h2>Repair Table</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Functionality</th>
        <th>Problem</th>
        <th>Status</th>
    </tr>
    <?php
    if ($result_select_admine->num_rows > 0) {
        while ($row = $result_select_admine->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["code"] . "</td>";
            echo "<td>" . $row["functionality"] . "</td>";
            echo "<td>" . $row["problem"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<!-- Display admine1 table -->
<h2>Maintenance Table</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Functionality</th>
        <th>Problem</th>
        <th>Status</th>
    </tr>
    <?php
    if ($result_select_admine1->num_rows > 0) {
        while ($row = $result_select_admine1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["code"] . "</td>";
            echo "<td>" . $row["functionality"] . "</td>";
            echo "<td>" . $row["problem"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<a href="admin_dashboard.php" class="button">Return</a>

<script>
    function showUpdateForm() {
        document.getElementById("updateForm").style.display = "block";
    }

    function populateUpdateForm(code, functionality, problem, status) {
        document.getElementById("updateCode").value = code;
        document.getElementById("updateFunctionality").value = functionality;
        document.getElementById("updateProblem").value = problem;
        document.getElementById("updateStatus").value = status;
        document.getElementById("updateForm").style.display = "block";
    }
</script>
</body>
</html>