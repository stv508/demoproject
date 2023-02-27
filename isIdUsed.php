<?php 
include("session.php");
$desgid = $_POST['desgid'];
$isidused = mysqli_query($connect, "SELECT `emp_designation` FROM `emp_professional` WHERE `emp_designation` = $desgid   AND  `emp_status` = 1");
echo $isidused_rows = mysqli_num_rows($isidused);
?>