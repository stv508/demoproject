<?php
include("session.php");
include("header.php");
$earning = $_POST['earning'];
$earn_insert = mysqli_query($connect, "INSERT INTO `earnings`( `earning_name`, `status`) VALUES ('$earning',1)");
$earn_select = mysqli_query($connect, "SELECT * FROM `earnings` WHERE earning_name = '$earning' AND `status` = 1 ");
$earn_select_fetch = mysqli_fetch_assoc($earn_select);
?>
<?php
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Add New Earning Success</h2>
                        <br>
                        <hr>
                        <p class="card-description"></p>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <!-- <div class="card"> -->
                                <div class="card-body">
                                    <div class="table-responsive pt-3">
                                        <form action="add_dedu.php" method="post">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name Of Earning</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $earn_select_fetch['earning_name'];?>" disabled/>
                                                    </div>
                                                    <!-- <div class="col-sm-2"> -->

                                                    <!-- </div><i class="icon-circle-plus icon-md " style="background-color: lightgray;border-radius: 10px; height: 50px;padding: 12px 12px;"></i> -->
                                                </div>
                                            </div>
                                            <center>
                                                <a href="create_earn.php"><button type="button" class="btn btn-info">Back</button></a>
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