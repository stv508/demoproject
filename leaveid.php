<?php
include("session.php");
echo $leaveid = $_POST['leaveid'];
echo $empid = $_POST['empid'];
$presentYear = date("y");
$leave_count = mysqli_query($connect, "SELECT * FROM emp_leaves WHERE emp_id = '$empid' AND `status` = 1 AND `year` = '$presentYear' ");
// SELECT `emp_id`,`year`, CASE WHEN year != LEFT(to_date,4) THEN DATEDIFF(from_date,LAST_DAY(from_date)) WHEN year != LEFT(from_date,4) THEN DAYOFMONTH(to_date) END AS a FROM emp_leaves
?>