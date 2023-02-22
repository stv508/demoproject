<?php
include("session.php");
$leave_sno = $_POST['leave_sno'];
$leave_accp = mysqli_query($connect, "UPDATE `emp_leaves` SET  `status`= 1 WHERE s_no = $leave_sno ");




?>