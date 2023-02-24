<?php
include("session.php");
include("header.php");
$earn_select = mysqli_query($connect, "SELECT * FROM `earnings` WHERE `status` = 1 ");
$dedu_select = mysqli_query($connect, "SELECT * FROM `deduction` WHERE `status` = 1 ");

?>
<?php
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    
                    <div class="card-body col-lg-12">
                        <h2 class="">Earnings Management</h2>
                        <br>
                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-40px);">
                            <a href="add_earn.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Add New Earning</button></a>
                        </div>
                        <hr>
                        <p class="card-description"></p>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Earnings List</h4>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered col-lg-6" style="width:100%">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;"><b>S.No</b></td>
                                                        <td><b>Name Of Earning</b></td>
                                                    </tr>
                                                    <?php
                                                    $count = 1;
                                                    while ($earn_select_fetch = mysqli_fetch_assoc($earn_select)) {
                                                        echo "<tr>
                                                        <td>" . $count . "</td>
                                                        <td>" . $earn_select_fetch['earning_name'] . "</td>
                                                    </tr>";
                                                        $count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="row">
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Deductions List</h4>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered col-lg-6" style="width:100%">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50px;"><b>S.No</b></td>
                                                        <td><b>Name Of Deduction</b></td>
                                                    </tr>
                                                    <?php
                                                    $count = 1;
                                                    while ($dedu_select_fetch = mysqli_fetch_assoc($dedu_select)) {
                                                        echo "<tr>
                                                        <td>" . $count . "</td>
                                                        <td>" . $dedu_select_fetch['deduction_name'] . "</td>
                                                    </tr>";
                                                        $count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</div>