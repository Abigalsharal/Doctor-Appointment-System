<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "doctor");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$email_id = $_SESSION['email_id'];
$Pid=$_SESSION['Pid'];
$username=$_SESSION['username'];
//$time=$_SESSION['time'];

$_SESSION['Pid']=$Pid;
$_SESSION['username']=$username;
$_SESSION['email_id']=$email_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Doctor Appointment</title>
	<link rel="stylesheet" href="main.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <br/><br/><h2>Doctor Appointment</h2><br/><br/>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="book.php"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;Show Appointments</a></li>
            <li><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="cover.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul> 
    </div>
    
    <div class="main_content">

         

        <div class="header">
			<strong style="font-size: 30px;">&nbsp;&nbsp;&nbsp;Hello, <?php echo $_SESSION['username']; ?> !</strong>
		</div>

        <div class="info">
          	<img src="image1.png" alt="Doctor Appointment"/>
      </div>
    </div>
</div>

</body>
</html>