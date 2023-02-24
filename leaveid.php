<?php
include("session.php");
$leaveid = $_POST['leaveid'];
$empid = $_POST['empid'];

$query1 = mysqli_query($connect, "SELECT sum(leaves_credit) AS credit, CASE WHEN sum(no_of_days) IS NULL THEN 0 ELSE sum(no_of_days) END AS noofleave, sum(leaves_surrender) AS surrender from emp_leaves WHERE emp_id = '$empid' AND leave_type ='$leaveid' GROUP BY emp_id, leave_type;");
$row = mysqli_fetch_assoc($query1);
echo $balance = $row['credit'] - $row['noofleave'] - $row['surrender'];
echo "*";
$leavetype = mysqli_query($connect,"SELECT * FROM leaves WHERE s_no = '$leaveid'");
$leave = mysqli_fetch_assoc($leavetype);
echo $leavecarry = $leave['status'];

?>



















