<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "doctor");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$Pid=$_SESSION['Pid'];
$username=$_SESSION['username'];

// $Did=$_SESSION['Did'];
// $slot_date=$_SESSION['slot_date'];
// $slot_time=$_SESSION['slot_time'];

$query=mysqli_query($conn,"SELECT * FROM booking where Pid=$Pid and booking='Yes'");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Appointment</title>
  <link rel="stylesheet" href="viewappointments.css">
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
      <form action="viewappointments.php" method="post">
        <div class="subcontainer">
      
        <p style="font-size: 25px;">Patient name: <?php echo $username?></p><br/>
        <table class="show">
          <tr>
            <th>Name Of the Doctor</th>
            <th>Specialization</th>
            <th>Time of Consultation</th>
            <th>Date of Consultation</th>
            <th>Cancel Appointment</th>
          </tr>
        <?php
          while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
          {
  
            $Dname=$row['Dname'];
            $specialization=$row['specialization'];
            $slot_time=$row['slot_time'];
            $slot_date=$row['slot_date'];
        ?>
    <tr>
    <td><?php echo $Dname ?></td>
    <td><?php echo $specialization; ?></td>
    <td><?php echo $slot_time;echo ":00 AM";?></td>
    <td><?php echo $slot_date; ?></td>
     <td><a href="delete_appointment.php?Did=<?php echo $row['Did']?>&&slot_date=<?php echo $row['slot_date']?>&&slot_time=<?php echo $row['slot_time']?>">X</a></td>
    </tr>
  <?php } ?>

</table>
</form>
</div>
</body>
</html>