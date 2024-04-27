<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Computer Maintenance Checklist</title>
<link rel="stylesheet" href="styles8.css">
<?php
 function generateCode() {
  $prefix = "RCMC";
  $randomNumber = rand(10000, 99999);
  $code = $prefix . $randomNumber;
  return $code;
}


function enregistrer_un_form1() {
  global $h1, $h2, $h3, $h4, $h5, $s1, $s2, $s3, $s4, $s5, $ms, $email, $date;

  try {
      include("connexionvb.php");
      
      // Fetch the repair code for the email
      $code = generateCode();


      $sql = "INSERT INTO meetings (h1,h2,h3,h4,h5,s1,s2,s3,s4,s5,ms, email, date, code) VALUES (:h1,:h2,:h3,:h4,:h5,:s1,:s2,:s3,:s4,:s5,:ms, :email, :date, :code)";
      $sql = $db->prepare($sql);
      $sql->bindvalue(':h1', $h1);
      $sql->bindvalue(':h2', $h2);
      $sql->bindvalue(':h3', $h3);
      $sql->bindvalue(':h4', $h4);
      $sql->bindvalue(':h5', $h5);
      $sql->bindvalue(':s1', $s1);
      $sql->bindvalue(':s2', $s2);
      $sql->bindvalue(':s3', $s3);
      $sql->bindvalue(':s4', $s4);
      $sql->bindvalue(':s5', $s5);
      $sql->bindvalue(':ms', $ms);
      $sql->bindvalue(':email', $email);
      $sql->bindvalue(':date', $date);
      $sql->bindvalue(':code', $code); // Include the repair code
      $sql->execute();

      if ($sql) {
          echo "Request submitted successfully";
         
          echo "<script>alert('THANK YOU FOR SUBMITTING. Here is your code: $code. Meet you on $date.')</script>";

      } else {
          echo "Error";
      }

      $sql->closecursor();
  } catch (Exception $e) {
      die('Error:' . $e->getMessage());
  }
}

    function scheduleMeeting($meetingDateTime) {
      global $h1, $h2, $h3, $h4, $h5, $s1, $s2, $s3, $s4, $s5, $ms, $email, $date;
  
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
          $sql = "SELECT COUNT(*) AS ms FROM meetings WHERE DATE(ms) = :meetingDate";
          $stmt = $db->prepare($sql);
          $stmt->bindValue(':meetingDate', $meetingDate);
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($result['ms'] > 0) {
              echo "Meeting date and time already scheduled.";
              return;
          }
  
          if ($result['ms'] >= 2) {
              echo "Maximum number of meetings reached for the selected date.";
              return;
          }
          if ($code === null) {
              $code = generateCode();
          }
          // Update the existing code to include the meeting_datetime column in the INSERT query
          $sql = "INSERT INTO meetings (h1,h2,h3,h4,h5,s1,s2,s3,s4,s5,ms, email, date) VALUES (:h1,:h2,:h3,:h4,:h5,:s1,:s2,:s3,:s4,:s5,:ms, :email, :date)";
          $sql = $db->prepare($sql);
          $sql->bindvalue(':h1', $h1);
          $sql->bindvalue(':h2', $h2);
          $sql->bindvalue(':h3', $h3);
          $sql->bindvalue(':h4', $h4);
          $sql->bindvalue(':h5', $h5);
          $sql->bindvalue(':s1', $s1);
          $sql->bindvalue(':s2', $s2);
          $sql->bindvalue(':s3', $s3);
          $sql->bindvalue(':s4', $s4);
          $sql->bindvalue(':s5', $s5);
          $sql->bindvalue(':ms', $ms);
          $sql->bindvalue(':email', $email);
          $sql->bindvalue(':date', $date);
          $sql->execute();

          if ($sql) {
            echo "Request submitted successfully";
          }else{
              echo "error me";
          }
      } catch (Exception $e) {
          die('Erreur:' . $e->getMessage());
      }
  }
  $date = date("Y-m-d"); // Automatically set the date to the current date
$meetingDateTime="";
$h1="";
$h2="";
$h3="";
$h4="";
$h5="";
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$ms="";
if (isset($_POST['hardware-q1'])) {
  $h1 = $_POST['hardware-q1'];
}
if (isset($_POST['hardware-q2'])) {
  $h2 = $_POST['hardware-q2'];
}
if (isset($_POST['hardware-q3'])) {
  $h3 = $_POST['hardware-q3'];
}
if (isset($_POST['hardware-q4'])) {
  $h4 = $_POST['hardware-q4'];
}
if (isset($_POST['hardware-q5'])) {
  $h5 = $_POST['hardware-q5'];
}
if (isset($_POST['software-q1'])) {
  $s1 = $_POST['software-q1'];
}
if (isset($_POST['software-q2'])) {
  $s2 = $_POST['software-q2'];
}
if (isset($_POST['software-q3'])) {
  $s3 = $_POST['software-q3'];
}
if (isset($_POST['software-q4'])) {
  $s4 = $_POST['software-q4'];
}
if (isset($_POST['software-q5'])) {
  $s5 = $_POST['software-q5'];
}
if (isset($_POST['meeting'])) {
  $ms = $_POST['meeting'];
}
if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['btnsubmit'])) {
  enregistrer_un_form1();
  
}
if (isset($_POST['date'])) {
  $date = $_POST['date'];
}



    ?>
</head>
<body>
<h1>Computer Maintenance Checklist</h1>
<form action="#" method="post">
<label for="date">Date of Request:</label>
    <input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br><br>
  <h2>Hardware</h2>
  <label for="hardware-q1">Have you tried rebooting your computer?</label>
  <select name="hardware-q1">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="hardware-q2">Is your device  making any unusual noise?</label>
  <select name="hardware-q2">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="hardware-q3">Have you ckgecked if there is any damaged part of your device?</label>
  <select name="hardware-q3">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="hardware-q4">Have you cleaned and dust your device?</label>
  <select name="hardware-q4">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="hardware-q5">Have you checked if all cables are connected well?</label>
  <select name="hardware-q5">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <!-- Repeat the above structure for remaining hardware questions -->

  <h2>Software</h2>
  <label for="software-q1">Have you checked your operating system?</label>
  <select name="software-q1">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="software-q2">Have you checked if your antivirus is up to date</label>
  <select name="software-q1">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="software-q2">Have you checked if there is any unusal problems in your backup files?</label>
  <select name="software-q2">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="software-q3">Do you know if there is any unusal warnings on your screen?</label>
  <select name="software-q3">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="software-q4">Have you checked your disk cleanup and defragmentation?</label>
  <select name="software-q4">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
  </select>
  <label for="software-q5">Have you checked if there is any software conflicts in your computer?</label>
  <select name="software-q5">
    <option value="done">Done without issues</option>
    <option value="issues">Issues found</option>
    <option value="na">Not applicable</option>
    
  </select>
   <label for="email">Email:</label>
    <input type="text" id="email" name="email" style="width: 790px; height: 25px;" required><br><br>
  <!-- Repeat the above structure for remaining software questions -->
  <label for="meeting">Meeting Date and Time:</label>
    <input type="datetime-local" id="meeting" name="meeting" required><br><br>
  <button type="submit" name="btnsubmit">Submit</button>
  <a href="admin.php" class="button">Return</a>
</form>
<script src="script.js"></script>
</body>
</html>