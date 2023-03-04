<?php
include("session.php");
include("header.php");
$et_fetch;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hsdate = $_POST["hsdate"];
    $reason_id = $_POST["reason"];
    $custom = $_POST["custom"];
    $success = "Holiday Set Unsuccessfull";
    if ($reason_id == 0) {
        $ins_reason = mysqli_query($connect, "INSERT INTO `reason` (`reason_name`) VALUES ('$custom')");

        if ($ins_reason) {
            $reasondata = mysqli_query($connect, "SELECT * FROM `reason` WHERE `reason_name` = '$custom'");
            $reasonno = mysqli_fetch_assoc($reasondata);
            $sno = $reasonno['s_no'];
            if ($sno) {
                $dateinsert = mysqli_query($connect, "INSERT INTO `reason_dates`(`reason_id`, `date`, `status`) VALUES ('$sno','$hsdate',1)");
                $success = "Holiday Set Successfull";
                $hsquery = mysqli_query($connect, "SELECT * FROM reason,reason_dates WHERE reason.s_no = reason_dates.reason_id AND reason_dates.status = 1 AND reason.s_no = '$sno'");
                $hsfetch = mysqli_fetch_assoc($hsquery);
            }
        }
    } else {
        $dateinsert = mysqli_query($connect, "INSERT INTO `reason_dates`(`reason_id`, `date`, `status`) VALUES ('$reason_id','$hsdate',1)");
        $success = "Holiday Set Successfull";
        $hsquery = mysqli_query($connect, "SELECT * from reason,reason_dates WHERE reason.s_no = reason_dates.reason_id AND reason_dates.status = 1 AND reason.s_no = '$reason_id' ");
        $hsfetch=mysqli_fetch_assoc($hsquery);
    }
    echo $get_fetch['date'];
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">
                            <?php
                            echo $success;
                            ?>
                        </h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Selected Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $hsfetch['date'];//echo $et_fetch['date']; ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $hsfetch['reason_name'];//$et_fetch['reason_name']; ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="leaves.php"><button style="margin-right: 30px ;" type="button" class="btn btn-success">Back</button></a>

                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("footer.php");
    ?>