<?php
include("session.php");
include("header.php");
echo $holi_sno = $_GET['holidayid'];
$holi_select =  mysqli_query($connect, "SELECT * FROM `holidays` WHERE `s.no` = '$holi_sno'");
$holi_select_fetch = mysqli_fetch_assoc($holi_select);
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Remove Holidays</h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $holi_select_fetch['date'] ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $holi_select_fetch['reason'] ?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="set_holidays_edit_succ.php?holidayid=<?php echo $holi_select_fetch['s.no']; ?>"><button style="margin-right: 30px ;" type="button" class="btn btn-danger">Remove</button></a>
                                <a href="holidays.php"><button type="button" class="btn btn-info">Cancel</button></a>
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