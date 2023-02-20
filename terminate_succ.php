<?php
include("session.php");
include("header.php");
$get = $_GET['empid'];
if (isset($get)) {
    // $emp_pannel = mysqli_query($connect, "SELECT * FROM `emp_personal`,`emp_professional`,`emp_designations`,`emp_PM` WHERE emp_professional.emp_id = emp_personal.emp_id AND emp_professional.emp_designation = emp_designations.designation_id AND emp_PM.emp_id = emp_professional.emp_id AND emp_PM.status = 1 AND emp_professional.emp_status = 1  AND emp_personal.emp_id= '$get'");
    // $emp_panal_fetch = mysqli_fetch_assoc($emp_pannel);
    mysqli_query($connect, "START TRANSACTION");
    $emp_term = mysqli_query($connect, "UPDATE `emp_personal` SET `emp_status`= 0  WHERE emp_id = '$get' AND emp_status = 1");
    
    if (isset($emp_term)) {
        mysqli_query($connect, "COMMIT");
    } else {
        mysqli_query($connect, "ROLLBACK");
        header("location: employees.php");
    }
} else {
    header("location: employees.php");
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-danger">Termination Successful</h2>
                        <br>
                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-40px);">
                            <!-- <a href="edit_employee.php?empid=<button type="button" class="btn btn-info btn-fw col-lg-12">Edit Employee</button></a> -->
                        </div>
                        <hr>
                        <p class="card-description"></p>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Employee Details</h4>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered" style="width:100%">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="width:15%"><b>Employee Name</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_name']; 
                                                            ?></td>
                                                        <td style="width:15%"><b>Phone No.</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_mobile']; 
                                                            ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Employee ID</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_id']; 
                                                            ?></td>
                                                        <td><b>Email</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_mail']; 
                                                            ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Employee Designation</b></td>
                                                        <td><?php //echo $emp_panal_fetch['designation_name']; 
                                                            ?></td>
                                                        <td><b>Pan No.</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_pan']; 
                                                            ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Adhar No.</b></td>
                                                        <td><?php //echo $emp_panal_fetch['emp_aadhar']; 
                                                            ?></td>
                                                        <td></td>
                                                        <td></td>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <center>
                                        <!-- <button id="terminate" style="margin-right: 30px ;" type="button" class="btn btn-danger">Terminate</button> -->
                                        <a href="employees.php"><button type="button" class="btn btn-success">Back</button></a>
                                    </center>
                                    <br>
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