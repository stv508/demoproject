<?php
include("session.php");
include("header.php");

// include
$todate = $_POST['todate'];
$fromdate  = $_POST['fromdate'];
$leaveid = $_POST['leaveid'];
$empid = $_GET['empid'];
$present_date = date("Y-m-d");
$days = mysqli_query($connect, "SELECT DATEDIFF('$todate','$fromdate')+1 AS `days`");
$days_fetch = mysqli_fetch_assoc($days);
$noofleaves = $days_fetch['days'];
// $noofleaves = $diff->format("%a");
$leave_insert = mysqli_query($connect, "INSERT INTO `emp_leaves`( `emp_id`, `applies_date`, `leave_type`, `from_date`, `to_date`, `no_of_days`,  `status`) VALUES ('$empid','$present_date','$leaveid','$fromdate','$todate','$noofleaves', 0 )");

// $sample_select = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `s_no` = '$reason'  ");
// $sam_fetch = mysqli_fetch_assoc($sample_select);
// echo $sam_fetch['leave_type'];
//  $ = $_POST['firsdate'];

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
                                        <input type="text"  class="form-control" disabled />
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
                                        <input type="text" class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <!-- <button id="apply" style="margin-right: 30px ;" type="submit" class="btn btn-success">Apply</button> -->
                                <a href="emp_pannel.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;Ok &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
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
    //   echo $diff;
    ?>