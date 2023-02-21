<?php
include("session.php");
$leaveid = $_POST['leaveid'];
$empid = $_POST['empid'];
$presentYear = date("Y");
$presentMonth = date("m");
$Cday = date("Y-m-d");
$query1 = mysqli_query($connect, "SELECT leaves_credit,leaves_surrender FROM emp_leaves WHERE  from_date IS NULL AND to_date  IS NULL AND no_of_days  IS NULL AND `status`  IS NULL AND applies_date  IS NULL AND leave_type = $leaveid AND emp_id = '$empid' ");
$query1_rows = mysqli_num_rows($query1);
if($query1_rows > 0){
    $query2 = mysqli_query($connect, "SELECT * FROM emp_leaves WHERE `status` = 1 AND emp_id = '$empid' AND leave_type = $leaveid");
    $query2_rows = mysqli_num_rows($query2);
    if($query2_rows > 0){
        $leave_count = mysqli_query($connect, "SELECT *,
    CASE 
        WHEN LEFT(from_date,4) = LEFT(to_date,4) THEN DATEDIFF(to_date,from_date)+1
        ELSE  
            (CASE 
                WHEN LEFT(from_date,4) < LEFT(to_date,4) THEN DAYOFMONTH(to_date)
                ELSE DATEDIFF(LAST_DAY(from_date),from_date)+1
             END)
        END AS cur_year_leaves
    FROM emp_leaves WHERE emp_id = '$empid' AND leave_type = $leaveid AND `status` = 1 ");
    $count = 0;
    while ($leave_count_fetch = mysqli_fetch_assoc($leave_count)) {
        // echo $leave_count_fetch['caldays'] ."--";
        $count = $count + $leave_count_fetch['cur_year_leaves'];
    }
    $leaves_max = mysqli_query($connect, "SELECT  MAX(leaves_credit) AS credit,MAX(leaves_surrender) AS surrender FROM `emp_leaves` WHERE `status` IS NULL AND emp_id = '$empid' AND year = LEFT(CURDATE(),4) AND leave_type = $leaveid ");
    $leaves_max_fetch = mysqli_fetch_assoc($leaves_max);
    $tot_leave = $leaves_max_fetch['credit'] + $leaves_max_fetch['surrender'];
    $count;
    if ($count > 0  && $tot_leave > 0) {
        echo ($tot_leave - $count);
    }
    }else{
        $leaves_max = mysqli_query($connect, "SELECT  MAX(leaves_credit) AS credit,MAX(leaves_surrender) AS surrender FROM `emp_leaves` WHERE `status` IS NULL AND emp_id = '$empid' AND year = LEFT(CURDATE(),4) AND leave_type = $leaveid ");
        $leaves_max_fetch = mysqli_fetch_assoc($leaves_max);
        echo $tot_leave = $leaves_max_fetch['credit'] + $leaves_max_fetch['surrender'];
    }
}
else{
    mysqli_query($connect, "START TRANSACTION");
    $select_leaves_max = mysqli_query($connect, "SELECT * FROM leaves WHERE s_no = $leaveid ");
    $select_leaves_max_fetch = mysqli_fetch_assoc($select_leaves_max);
    $leave_credit = $select_leaves_max_fetch['max_in_year'];
    $set_credit = mysqli_query($connect, "INSERT INTO `emp_leaves`( `emp_id`,  `leave_type`, `year`, `leaves_credit`, `leaves_surrender`) VALUES ('$empid','$leaveid','$presentYear','$leave_credit', 0 )");
    if(isset($leave_credit) && isset($set_credit) ){
        mysqli_query($connect, "COMMIT");
        $leaves_max = mysqli_query($connect, "SELECT  MAX(leaves_credit) AS credit,MAX(leaves_surrender) AS surrender FROM `emp_leaves` WHERE `status` IS NULL AND emp_id = '$empid' AND year = LEFT(CURDATE(),4) AND leave_type = $leaveid ");
        $leaves_max_fetch = mysqli_fetch_assoc($leaves_max);
        $tot_leave = $leaves_max_fetch['credit'] + $leaves_max_fetch['surrender'];
        if ($tot_leave > 0) {
            echo ($tot_leave);
        }
    }
    else{
            mysqli_query($connect, "ROLLBACK");
            echo "Something went wrong please try again";
    }
}



















