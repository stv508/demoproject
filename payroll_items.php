<?php
include("session.php");
include("header.php");
?>
<?php
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body col-lg-12">
                        <h2 class="">Salary Management</h2>
                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-30px);">
                            <a href="add_payroll_item.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Add New Payroll Item</button></a>
                        </div>
                        <br>
                        <p class="card-description"></p>
                        <hr>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class=" col-lg-6">
                                                <h4 class="card-title">Earnings List</h4>
                                                <!-- <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-30px);">
                                                    <a href="add_earn.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Add New Earning</button></a>
                                                </div> -->
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered " style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <td style="width: 50px;"><b>S.No</b></td>
                                                                <td><b>Name Of Earning</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $earn_select = mysqli_query($connect, "SELECT * FROM `payroll` WHERE `status` = 1 AND payroll_type = 'e' ");
                                                            $count = 1;
                                                            while ($earn_select_fetch = mysqli_fetch_assoc($earn_select)) {
                                                                $payid = $earn_select_fetch['s_no'];
                                                                echo "<tr>
                                                                            <td>" . $count . "</td>
                                                                            <td><a href='view_pay_roll.php?payrollid=$payid'>" . $earn_select_fetch['payroll_name'] . "</a></td>
                                                                        </tr>";
                                                                    $count++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class=" col-lg-6">
                                                <h4 class="card-title">Deductions List</h4>
                                                <!-- <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-30px);">
                                                    <a href="add_dedu.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Add New Deduction</button></a>
                                                </div> -->
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered " style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <td style="width: 50px;"><b>S.No</b></td>
                                                                <td><b>Name Of Deduction</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $dedu_select = mysqli_query($connect, "SELECT * FROM `payroll` WHERE `status` = 1 AND payroll_type = 'd' ");
                                                            $count = 1;
                                                            while ($dedu_select_fetch = mysqli_fetch_assoc($dedu_select)) {
                                                                    $payid = $dedu_select_fetch['s_no'];
                                                                    echo "<tr>
                                                                            <td>" . $count . "</td>
                                                                            <td><a href='view_pay_roll.php?payrollid=$payid'>" . $dedu_select_fetch['payroll_name'] . "</a></td>
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
    </div>
    <?php
    include("footer.php");
    ?>
</div>