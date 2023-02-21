<?php
include("session.php");
include("header.php");
// include("encrypt.php");
$emp_list = mysqli_query($connect, "SELECT * FROM `emp_personal`,`emp_professional`,`emp_designations`,`emp_PM` WHERE emp_professional.emp_id = emp_personal.emp_id AND emp_professional.emp_designation = emp_designations.designation_id AND emp_PM.emp_id = emp_professional.emp_id AND emp_PM.status = 1 AND emp_professional.emp_status = 1  AND emp_personal.emp_status = 1");
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Employees Salary</h2>
                        <div class="col-sm-4" style="display: flex; float: right; transform: translateY(-40px); ">                            
                            <a href="add_salary.php"><button type="button" style="transform: translateX(450px);" class="btn btn-info btn-fw col-lg-12"> Add Salary </button></a>
                        </div>

                        <p class="card-description"></p>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Payslip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    while ($emp_fetch = mysqli_fetch_assoc($emp_list)) {
                                        // $enc = ;
                                        echo "<tr>
                                                <td>" . $count . "</td>
                                                <td><a href='emp_pannel.php?empid=".$emp_fetch['emp_id']. "'>" . $emp_fetch['emp_id'] . "</a></td>
                                                <td>" . $emp_fetch['emp_name'] . "</td>
                                                <td>" . $emp_fetch['designation_name'] . "</td>
                                                <td>" . $emp_fetch['emp_doj'] . "</td>
                                                <td></td>
                                                <td style='width: 150px;'><a href='gen_payslip.php'><button type='button' class='btn btn-inverse-success' >Generate Slip</button></a></td>
                                            </tr>";
                                        $count = $count + 1;
                                    }

                                    ?>
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
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