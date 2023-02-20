<?php
include("session.php");
$leave_app_id = $_POST['leave_app_id'];
$request_info = mysqli_query($connect, "SELECT * FROM `emp_leaves` WHERE `s_no` = '$leave_app_id' ");

?>