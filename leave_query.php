<?php
include("session.php");
include("header.php");
echo $todate = $_POST['todate'];
echo $fromdate  = $_POST['fromdate'];
echo $leaveid = $_POST['leaveid'];
echo $empid = $_GET['empid'];
echo $present_date = date("Y-m-d");
$days = mysqli_query($connect, "SELECT DATEDIFF('$todate','$fromdate')+1 AS `days`");
$days_fetch = mysqli_fetch_assoc($days);
echo $noofleaves = $days_fetch['days'];
// mysqli_query($connect,"START TRANSACTION");
$leave_insert = mysqli_query($connect, "INSERT INTO `emp_leaves`( `emp_id`, `applies_date`, `leave_type`, `from_date`, `to_date`, `no_of_days`,  `status`) VALUES ('$empid','$present_date', $leaveid,'$fromdate','$todate', $noofleaves , 0 )");
// mysqli_query($connect,"INSERT INTO `emp_leaves`(`emp_id`, `applies_date`, `leave_type`, `year`, `leaves_credit`, `from_date`, `to_date`, `no_of_days`, `leaves_surrender`, `description`, `status`) VALUES ('$empid','$present_date','$leaveid', NULL,NULL,'$fromdate','$todate','$noofleaves',NULL,NULL,0)");
$leave_select = mysqli_query($connect, "SELECT * FROM emp_leaves WHERE emp_id = '$empid' AND leave_type = $leaveid AND `from_date` = '$fromdate' AND  `to_date` = '$todate' ");
$leave_select_fetch = mysqli_fetch_assoc($leave_select);
echo $leave_insert;
// if(isset($leave_insert)){
//     echo "OK";
//     mysqli_query($connect,"COMMIT");
// }else{
//     echo "error";
//     mysqli_query($connect,"ROLLBACK");
// }
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h1">Request Has Been Sent To HR <span class="h4"> Please Wait For HR Approvel</span></h2>
                        <br><br>
                        <form >
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type Of Leave</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="<?php //echo $leave_select_fetch['']?>"  class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Leaves Available In This Month</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="la" class="form-control" disabled />
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Applied Leave Days</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php //echo $leave_select_fetch['']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" value="<?php //echo $leave_select_fetch['']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" value="<?php //echo $leave_select_fetch['']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <!-- <button id="apply" style="margin-right: 30px ;" type="submit" class="btn btn-success">Apply</button> -->
                                <a href="emp_pannel.php?empid=<?php echo $empid; ?>"><button type="button" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;Ok &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    //   $from = Document.getElementById('fromdate');
    //   $to =Document.getElementById('todate');
    //   $diff =Date_diff($to,$from);
    //   //echo $diff;
    ?>