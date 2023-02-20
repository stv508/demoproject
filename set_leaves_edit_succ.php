<?php
include("session.php");
include("header.php");
echo $gets_no = $_GET['leaveid'];
$remove = mysqli_query($connect, "UPDATE `leaves` SET `status`= 0 WHERE `status` = 1 AND `s_no` = '$gets_no' ");
if (!isset($remove)) {
    header("location: leaves.php");
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Remove Leave Successful</h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type of Leave</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="leavetype" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Year</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="leavesYear" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Month</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <!-- <button style="margin-right: 30px ;" type="submit" class="btn btn-danger">Remove</button> -->
                                <a href="leaves.php"><button type="button" class="btn btn-info">Back</button></a>
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
    <script>
        noAlpha(document.getElementById("mly"));
        noAlpha(document.getElementById("mlm"));
    </script>