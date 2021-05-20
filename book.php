<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "doctor");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$Pid=$_SESSION['Pid'];
$email_id=$_SESSION['email_id'];
$username=$_SESSION['username'];

if(isset($_POST['submit'])){
$vdate = mysqli_real_escape_string($conn, $_REQUEST['vdate']);
  $_SESSION['vdate']=$vdate;
    header('location:book_slot.php');
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Appointment</title>
  <link rel="stylesheet" href="book.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <br/><br/><h2>Doctor Appointment</h2><br/><br/>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="book.php"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;Show Appointments</a></li>
            <li><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="cover.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul> 
    </div>
    
    <div class="main_content">
      <form action="book.php" method="post">
      <div class="subcontainer">
        <label><b style="font-size: 20px;">Name:</b></label><br>
        <input type="text" name="username" disabled placeholder=<?php echo $_SESSION['username'];?>><br>

        <div class="form-group">
          <label for="ldate"><b style="font-size: 20px;">Date of Visit:</b></label><br>
          <input type="text" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+10 day'));?>" class="form-control" id="vdate" name="vdate" required="">
        </div>

        <center><input type="submit" name="submit" id="btn" class="button1" value="Continue">
        <input type="button" name="back" id="btn" class="button2" value="Back" onclick="location.href='main.php';"></center>
    </div>
</form>
</div>
</div>
</body>
</html>