<?php
include('session.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$todate = $_POST['todate'];
$fromdate  = $_POST['fromdate'];
$leaveid = $_POST['leaveid'];
$empid = $_POST['empid'];
$noofleaves = $_POST['datediff'];
$present_date = date('Y-m-d');
$leave_select = mysqli_query($connect, "SELECT emp_leaves.*,leaves.leave_type AS leave_name FROM emp_leaves,leaves WHERE emp_leaves.leave_type = leaves.s_no AND leaves.status = 1 AND emp_leaves.emp_id = '$empid' AND emp_leaves.leave_type = $leaveid AND emp_leaves.from_date = '$fromdate' AND  emp_leaves.to_date = '$todate' ");
echo $leave_select_rows = mysqli_num_rows($leave_select);
    // if ($leave_select_rows > 0) {
    //     header("location: apply_leave.php");
    // }
}
?>