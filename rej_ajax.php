<?php 
include("session.php");
$emp_leave_sno = $_POST['emp_leave_sno'];
$sele_row = mysqli_query($connect, "UPDATE `emp_leaves` SET  `status`= NULL WHERE s_no = $emp_leave_sno ");
?>