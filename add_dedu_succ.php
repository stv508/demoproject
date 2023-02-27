<?php
include("session.php");
include("header.php");
echo $deduction = $_POST['deduction'];
$dedu_insert = mysqli_query($connect, "INSERT INTO `deduction`( `deduction_name`,`payroll_type`, `status`) VALUES ('$deduction','d',1)");
$dedu_select = mysqli_query($connect, "SELECT * FROM `deduction` WHERE deduction_name = '$deduction' AND `status` = 1 ");
$dedu_select_fetch = mysqli_fetch_assoc($dedu_select);
?>
<?php
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Add New Deduction Success</h2>
                        <br>
                        <hr>
                        <p class="card-description"></p>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <!-- <div class="card"> -->
                                <div class="card-body">
                                    <div class="table-responsive pt-3">
                                        <form action="add_earn_succ.php" method="post">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name Of Deduction</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $dedu_select_fetch['deduction_name'];?>" disabled/>
                                                    </div>
                                                    <!-- <div class="col-sm-2"> -->

                                                    <!-- </div><i class="icon-circle-plus icon-md " style="background-color: lightgray;border-radius: 10px; height: 50px;padding: 12px 12px;"></i> -->
                                                </div>
                                            </div>
                                            <center>
                                                <a href="payroll_items.php"><button type="button" class="btn btn-info">Back</button></a>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>