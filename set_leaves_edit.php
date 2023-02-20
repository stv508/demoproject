<?php
include("session.php");
include("header.php");
echo $getsno = $_GET['leaveid'];

$select_leave = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `s_no` = '$getsno'");
$select_leave_fetch = mysqli_fetch_assoc($select_leave);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Remove Leave</h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type of Leave</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $select_leave_fetch['leave_type'] ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Year</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $select_leave_fetch['max_in_year'] ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Month</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $select_leave_fetch['max_in_month'] ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center> <!--set_leaves_edit_succ.php -->
                                <a href="set_leaves_edit_succ.php?leaveid=<?php echo $select_leave_fetch['s_no']; ?>"><button style="margin-right: 30px ;" type="button" class="btn btn-danger">Remove</button></a>
                                <a href="leaves.php"><button type="button" class="btn btn-info">Cancel</button></a>
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