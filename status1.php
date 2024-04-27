<?php
include("connexionvb.php");

if(isset($_GET['code'])) {
    $entered_code = $_GET['code'];
    
    $sql = "SELECT a.*, r.email as repair_email
            FROM admine a
            LEFT JOIN repair r ON a.code = r.code
            WHERE a.code=:code";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':code', $entered_code);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reparation Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .return-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reparation Status</h1>
        <?php if(isset($result) && $result): ?>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Code</td>
                    <td><?php echo $result['code']; ?></td>
                </tr>
                <tr>
                    <td>Functionality</td>
                    <td><?php echo $result['functionality']; ?></td>
                </tr>
                <tr>
                    <td>Problem</td>
                    <td><?php echo $result['problem']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $result['status']; ?></td>
                </tr>
                <tr>
                    <td>Email (Meetings)</td>
                    <td><?php echo $result['repair_email']; ?></td>
                </tr>
                <!-- Add more fields as needed -->
            </table>
        <?php else: ?>
            <p>No information found for this code.</p>
        <?php endif; ?>
        <a href="status.php" class="return-link">Return</a>
    </div>
</body>
</html>
