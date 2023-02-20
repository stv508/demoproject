<?php
include("session.php");
// include
$todate = $_POST['tdate'];
$reason = $_POST['reas'];
$fromdate  = $_POST['fdate'];
$difference_day = $_POST['differ'];
$empid = $_POST['empid'];
$presentYear  = date("Y");
$presentMonth = date("m");
$leaves_avail_or_not = mysqli_query($connect, "SELECT `emp_id` FROM `emp_leaves` WHERE emp_id = '$empid' AND leave_type = '$reason' ");
$leaves_avail_or_not_rows = mysqli_num_rows($leaves_avail_or_not);

if($leaves_avail_or_not_rows > 0){
    $emps_cred  = mysqli_query($connect, "SELECT emp_id,MIN(leaves_credit)  AS leaves_credit FROM `emp_leaves` WHERE emp_id = '$empid' ");
    $emps_cred_fetch = mysqli_fetch_assoc($emps_cred);
    $leaves_credit = $emps_cred_fetch['leaves_credit'] - $difference_day;
    $leave_insert = mysqli_query($connect , "INSERT INTO `emp_leaves`(`emp_id`, `leave_type`, `year`, `leaves_credit`, `from_date`, `to_date`, `no_of_days`, `leaves_surrender`, `description`, `status`) VALUES ('$empid',$reason,'$presentYear',null,'$fromdate','$todate',$difference_day,NULL,'',1)");
    // INSERT INTO `emp_leaves`(`emp_id`, `leave_type`, `year`, `leaves_credit`, `from_date`, `to_date`, `no_of_days`, `leaves_surrender`, `description`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')
    echo "this is if";
}
else{
    $select_leaves = mysqli_query($connect , "SELECT * FROM `leaves` WHERE `status` = 1 AND s_no = $reason ");
    $select_leaves_fetch = mysqli_fetch_assoc($select_leaves);
    echo $leave_max_year = $select_leaves_fetch['max_in_year'];
    $new_insert = mysqli_query($connect , "INSERT INTO  `emp_leaves` (`emp_id`, `leave_type`, `year`, `leaves_credit`, `from_date`, `to_date`, `no_of_days`, `leaves_surrender`, `description`, `status`) VALUES ('$empid' ,$reason ,'$presentYear' ,null ,'$fromdate','$todate',$difference_day, 0 , '' , 1 )  ");
    echo "this is else";
    
}
echo "ok";
// $sample_select = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `s_no` = '$reason'  ");
// $sam_fetch = mysqli_fetch_assoc($sample_select);
// echo $sam_fetch['leave_type'];
    //  $ = $_POST['firsdate'];
    
?>