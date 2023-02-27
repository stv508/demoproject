<?php
include('session.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todate = $_POST['todate'];
    $fromdate  = $_POST['fromdate'];
    $leaveid = $_POST['leaveid'];
    $empid = $_POST['empid'];
    $noofleaves = $_POST['datediff'];
    $present_date = date('Y-m-d');
    $leave_insert = mysqli_query($connect, "INSERT INTO `emp_leaves`( `emp_id`, `applies_date`, `leave_type`, `from_date`, `to_date`, `no_of_days`,  `status`) VALUES ('$empid','$present_date', $leaveid,'$fromdate','$todate', $noofleaves , 0 )");
    $leave_select = mysqli_query($connect, "SELECT emp_leaves.*,leaves.leave_type AS leave_name FROM emp_leaves,leaves WHERE emp_leaves.leave_type = leaves.s_no AND leaves.status = 1 AND emp_leaves.emp_id = '$empid' AND emp_leaves.leave_type = $leaveid AND emp_leaves.from_date = '$fromdate' AND  emp_leaves.to_date = '$todate' ");
    $leave_select_fetch = mysqli_fetch_assoc($leave_select);
    echo "<h2 class='h1'>Request Has Been Sent To HR <span class='h4'> Please Wait For HR Approvel</span></h2>
        <br><br>
        <form >
            <div class='col-md-10'>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Type Of Leave</label>
                    <div class='col-sm-4'>
                        <input type='text' value='" . $leave_select_fetch['leave_name'] . "'  class='form-control' disabled />
                    </div>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>Applied Leave Days</label>
                    <div class='col-sm-4'>
                        <input type='text' class='form-control' value='" . $leave_select_fetch['no_of_days'] . "' disabled />
                    </div>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>From Date</label>
                    <div class='col-sm-4'>
                        <input type='text'  class='form-control' value='" . $leave_select_fetch['from_date'] . "' disabled />
                    </div>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='form-group row'>
                    <label class='col-sm-3 col-form-label'>To Date</label>
                    <div class='col-sm-4'>
                        <input type='text'  class='form-control' value='" . $leave_select_fetch['to_date'] . "' disabled />
                    </div>
                </div>
            </div>
            <center>
                <a href='emp_pannel.php?empid=" . $empid . "'><button type='button' class='btn btn-success'>&nbsp;&nbsp;&nbsp;&nbsp;Ok &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
            </center>
        </form>";
    
    
}









































// if(isset($leave_insert)){
//     echo 'OK';
//     mysqli_query($connect,'COMMIT');
// }else{
//     echo 'error';
//     mysqli_query($connect,'ROLLBACK');
// }
?>
<!-- 
<div class='main-panel'>
    <div class='content-wrapper'>
        <div class='row'>
            <div class='col-lg-12 grid-margin stretch-card'>
                <div class='card'>
                    <div class='card-body'>
                        <h2 class='h1'>Request Has Been Sent To HR <span class='h4'> Please Wait For HR Approvel</span></h2>
                        <br><br>
                        <form >
                            <div class='col-md-10'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Type Of Leave</label>
                                    <div class='col-sm-4'>
                                        <input type='text' value='<?php //echo $leave_select_fetch['leave_name']
                                                                    ?>'  class='form-control' disabled />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>Applied Leave Days</label>
                                    <div class='col-sm-4'>
                                        <input type='text' class='form-control' value='<?php //echo $leave_select_fetch['no_of_days']
                                                                                        ?>' disabled />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>From Date</label>
                                    <div class='col-sm-4'>
                                        <input type='text'  class='form-control' value='<?php //echo $leave_select_fetch['from_date']
                                                                                        ?>' disabled />
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-10'>
                                <div class='form-group row'>
                                    <label class='col-sm-3 col-form-label'>To Date</label>
                                    <div class='col-sm-4'>
                                        <input type='text'  class='form-control' value='<?php //echo $leave_select_fetch['to_date']
                                                                                        ?>' disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href='emp_pannel.php?empid=<?php //echo $empid; 
                                                                ?>'><button type='button' class='btn btn-success'>&nbsp;&nbsp;&nbsp;&nbsp;Ok &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
<?php
// include('footer.php');
?>