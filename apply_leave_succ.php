<?php
include("session.php");
include("header.php");

echo "<br>".$todate = $_POST['todate'];
echo "<br>".$fromdate  = $_POST['fromdate'];
echo "<br>".$leaveid = $_POST['leaveid'];
echo "<br>".$empid = $_POST['empid'];
echo "<br>".$noofleaves = $_POST['datediff'];
echo "<br>".$present_date = date("Y-m-d");
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
                                        <input type="text" value="<?php echo $leave_select_fetch['leave_name']?>"  class="form-control" disabled />
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
                                        <input type="text" class="form-control" value="<?php echo $leave_select_fetch['no_of_days']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" value="<?php echo $leave_select_fetch['from_date']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label>
                                    <div class="col-sm-4">
                                        <input type="text"  class="form-control" value="<?php echo $leave_select_fetch['to_date']?>" disabled />
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
    ?>