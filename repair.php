<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPAIR Form</title>
    <link rel="stylesheet" href="style6.css">

    <?php
    function generateCode() {
        $prefix = "RSMS";
        $randomNumber = rand(10000, 99999);
        $code = $prefix . $randomNumber;
        return $code;
    }

   
function enregistrer_un_form() {
    global $date, $fullname, $email, $device, $other, $devicename, $devicemodel, $specifications, $issues, $picture, $code;

    try {
        include("connexionvb.php");

        // Validate email field
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a valid email address.";
            return;
        }

        if (isset($_FILES['picture'])) {
            $picture = $_FILES['picture']['name'];
            $picture_tmp = $_FILES['picture']['tmp_name'];
            move_uploaded_file($picture_tmp, "uploads/" . $picture);
        }

        $sql = "INSERT INTO repair (date, fullname, email, device, other, devicename, devicemodel, specification, issues, pictures, code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$date, $fullname, $email, $device, $other, $devicename, $devicemodel, $specifications, $issues, $picture, $code]);

        if ($stmt) {
            echo "Request submitted successfully";
        } else {
            echo "Error";
        }

        $stmt->closeCursor();
    } catch (Exception $e) {
        die('Erreur:' . $e->getMessage());
    }
}
   
    function scheduleMeeting($meetingDateTime) {
        global $date, $fullname, $email, $device, $other, $devicename, $devicemodel, $specifications, $issues, $picture, $code,$meetingTime;

    
        try {
            include("connexionvb.php");
    
            // Check if the meeting date is within the allowed range (not less than the current date and not more than three months)
            $currentDate = date("Y-m-d H:i:s");
            $threeMonthsLater = date("Y-m-d H:i:s", strtotime("+3 months"));
    
            if ($meetingDateTime < $currentDate || $meetingDateTime > $threeMonthsLater) {
                echo "Invalid meeting date and time.";
                return;
            }
    
            // Check if there are already two meetings scheduled for the selected date
            $meetingDate = date("Y-m-d", strtotime($meetingDateTime));
            $sql = "SELECT COUNT(*) AS meeting_count FROM repair WHERE DATE(meeting_count) = :meetingDate";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':meetingDate', $meetingDate);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result['meeting_count'] > 0) {
                echo "Meeting date and time already scheduled.";
                return;
            }
    
            if ($result['meeting_count'] >= 2) {
                echo "Maximum number of meetings reached for the selected date.";
                return;
            }
            if ($code === null) {
                $code = generateCode();
            }
            // Update the existing code to include the meeting_datetime column in the INSERT query
            $sql = "INSERT INTO repair (date, fullname, email, device, other, devicename, devicemodel, specification, issues, pictures, code, meeting_count, meeting_time) VALUES (:date, :fullname, :email, :device, :other, :devicename, :devicemodel, :specifications, :issues, :picture, :code, :meetingDate, :meetingTime)";
            $sql = $db->prepare($sql);
            // ... bind the other form values ...
            $sql->bindvalue(':meetingDate', $meetingDate);
            $sql->bindvalue(':meetingTime', $meetingTime);
            // ... execute the query ...
            $sql->bindvalue(':date', $date);
            $sql->bindvalue(':fullname', $fullname);
            $sql->bindvalue(':email', $email);
            $sql->bindvalue(':device', $device);
            $sql->bindvalue(':other', $other);
            $sql->bindvalue(':devicename', $devicename);
            $sql->bindvalue(':devicemodel', $devicemodel);
            $sql->bindvalue(':specifications', $specifications);
            $sql->bindvalue(':issues', $issues);
            $sql->bindvalue(':picture', $picture);
            $sql->bindvalue(':code', $code); 
            $sql->execute();
            if ($sql) {
                echo "REQUEST SUBMITTED SCHEDULED";
                echo "<script>alert('THANK YOU FOR SUBMITTING $fullname. Here is your code: $code. Meet you on $meetingDate at $meetingTime.')</script>";
            }else{
                echo "error me";
            }
            // Rest of the code remains the same
            // ...
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    $date = date("Y-m-d"); // Automatically set the date to the current date
$meetingTime="";
$meetingDate="";
    $fullname = "";
    $address = "";
    $device = "";
    $other = "";
    $devicename = "";
    $devicemodel = "";
    $specifications = "";
    $issues = "";
    $picture = "";
    $picture_tmp = "";

    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['device'])) {
        $device = $_POST['device'];
    }
    if (isset($_POST['other'])) {
        $other = $_POST['other'];
    }
    if (isset($_POST['devicename'])) {
        $devicename = $_POST['devicename'];
    }
    if (isset($_POST['devicemodel'])) {
        $devicemodel = $_POST['devicemodel'];
    }
    if (isset($_POST['specifications'])) {
        $specifications = $_POST['specifications'];
    }
    if (isset($_POST['issues'])) {
        $issues = $_POST['issues'];
    }
    if (isset($_FILES['picture'])) {
        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($picture_tmp, "uploads/" . $picture);
    }
    if (isset($_POST['code'])) {
        $issues = $_POST['code'];
    }
    if (isset($_POST['btnsubmit'])) {

        if (isset($_POST['meetingDate']) && isset($_POST['meetingTime'])) {
            $meetingDate = $_POST['meetingDate'];
            $meetingTime = $_POST['meetingTime'];
        
            // Concatenate date and time to form a datetime string
            $meetingDateTime = $meetingDate . ' ' . $meetingTime;
        
            // Call the function to schedule the meeting with the combined datetime value
            scheduleMeeting($meetingDateTime);
        }
        

    }
    ?>

</head>
<form action="#" method="post" enctype="multipart/form-data">
    <h1>REPAIR REQUEST FORM</h1>

    <label for="date">Date of Request:</label>
    <input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br><br>

    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br><br>

    <label for="device">Select Device:</label>
    <select id="device" name="device" onchange="showOtherDevice()">
        <option value="scanner">Scanner</option>
        <option value="printer">Printer</option>
        <option value="laptop">Laptop</option>
        <option value="desktop">Desktop</option>
        <option value="other">Other</option>
    </select><br><br>

    <div id="otherDevice" style="display:none;">
        <label for="other">Other Device:</label>
        <input type="text" id="other" name="other"><br><br>
    </div>

    <label for="devicename">Device Name:</label>
    <input type="text" id="devicename" name="devicename" required><br><br>

    <label for="devicemodel">Device Model:</label>
    <input type="text" id="devicemodel" name="devicemodel" required><br><br>

    <label for="specifications">Specifications:</label>
    <textarea id="specifications" name="specifications" required></textarea><br><br>

    <label for="issues">Issues:</label>
    <textarea id="issues" name="issues" required></textarea><br><br>

    <label for="picture">Upload Picture:</label>
<input type="file" id="picture" name="picture" accept="image/*" onchange="previewImage(event)"><br><br>
<img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">

<label for="meetingDate">Meeting Date:</label>
<input type="date" id="meetingDate" name="meetingDate" required><br><br>

<label for="meetingTime">Meeting Time (between 8 am and 4 pm):</label>
<input type="time" id="meetingTime" name="meetingTime" min="08:00" max="16:00" required><br><br>




    <input type="submit" value="Submit Request" name="btnsubmit"><br><br>
    <a href="admin.php" class="button">Return</a>

</form>
<script>
    function showOtherDevice() {
    var device = $("#device").val();
    var otherDevice = $("#otherDevice");

    if (device === "other") {
        otherDevice.show();
    } else {
        otherDevice.hide();
    }
}
</script>
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById("preview");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            preview.style.display = "none";
        }
    }
</script>
