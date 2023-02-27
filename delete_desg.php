<?php 
include("session.php");
$desgid = $_POST['desgid'];
$delete = mysqli_query($connect, "UPDATE `emp_designations` SET  `status`= 0 WHERE `designation_id` = '$desgid' ");
?>
