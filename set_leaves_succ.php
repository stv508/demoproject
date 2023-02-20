<?php
include("session.php");
include("header.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "-".$type = $_POST['leavetype'];
    echo "-".$maxYear   = $_POST['leavesYear'];
    echo "-".$maxMonth  = $_POST['leaveMonth'];
    $set_leaves = mysqli_query($connect , "INSERT INTO `leaves`(`leave_type`, `max_in_year`, `max_in_month`, `status`) VALUES ('$type','$maxYear','$maxMonth',1)");
    
    if(isset($set_leaves)){
        $max = mysqli_query($connect,"SELECT max(s_no) AS `max` FROM `leaves`");
        echo "fetch : ".$maxfetch = mysqli_fetch_assoc($max);
        echo "value:".$s_max = $maxfetch['max'];
        $leave_select = mysqli_query($connect, "SELECT * FROM  `leaves` WHERE `s_no` =  '$s_max' ");
        $leave_select_fetch = mysqli_fetch_assoc($leave_select);
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Set Leaves Successful</h2>
                        <br><br>
                        <form action="set_holidays_success.php" method="post">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type of Leave</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $leave_select_fetch['leave_type']?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Year</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="2" class="form-control" value="<?php echo $leave_select_fetch['max_in_year']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Month</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" maxlength="2" id="mlm" value="<?php echo $leave_select_fetch['max_in_month']?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                                <a href="leaves.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    ?>
    <script>
        noAlpha(document.getElementById("mly"));
        include("footer.php");
        noAlpha(document.getElementById("mlm"));
    </script>