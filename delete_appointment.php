<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "doctor");

$Did=$_GET['Did'];
$slot_date=$_GET['slot_date'];
$slot_time=$_GET['slot_time'];


$query = "UPDATE booking set booking = 'No' WHERE Did=$Did and slot_date=$slot_date and slot_time=$slot_time";

if(mysqli_query($conn,$query))
{
	// echo $Did;
	// echo $slot_date;
	// echo $slot_time;
	header('location:viewappointments.php');
}
?>
<html>
<body>

</body>
</html>

