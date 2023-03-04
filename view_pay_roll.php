<?php
include("session.php");
include("header.php");
$payrollid = $_GET['payrollid'];
$pay_select = mysqli_query($connect, "SELECT * FROM `payroll`,`salary` WHERE payroll.s_no = salary.payroll_id AND payroll.s_no = $payrollid AND payroll.status = 1 AND salary.status = 1  ");
$pay_select_fetch = mysqli_fetch_assoc($pay_select);
echo $type = $pay_select_fetch['payroll_type'];

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class=""><?php if($type == 'd'){echo "Deductions";}elseif($type == 'e'){ echo "Earnings";} ?></h2>
                        <div class="col-sm-4" style="display: flex; float: right; transform: translateY(-40px); ">
                            <a href="edit_payroll.php"><button type="button" style="transform: translateX(300px);" class="btn btn-info btn-fw col-lg-12">Edit Payroll</button></a>
                        </div>
                        <p class="card-description"></p>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">SI.No</th>
                                        <th>Name Of Payroll</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include("footer.php")
?>