<?php
include("session.php");
include("header.php");
include("encrypt.php");
$get = $_GET['empid'];
if (isset($get)) {
    $emp_pannel = mysqli_query($connect, "SELECT * FROM `emp_personal`,`emp_professional`,`emp_designations`,`emp_PM` WHERE emp_professional.emp_id = emp_personal.emp_id AND emp_professional.emp_designation = emp_designations.designation_id AND emp_PM.emp_id = emp_professional.emp_id AND emp_PM.status = 1 AND emp_professional.emp_status = 1  AND emp_personal.emp_id= '$get'");
    $emp_panal_fetch = mysqli_fetch_assoc($emp_pannel);
} else {
    header("location: employees.php");
}
// echo $day = date("l");
$presentYear  = date("Y");
$presentMonth = date("m");
$holidays = mysqli_query($connect, "SELECT * FROM `holidays` WHERE LEFT(date,4) = '$presentYear' AND `status` = 1 ");
$leave_sele = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `status` = 1 ");
$presentdate = date("Y-m-d");

$month_cal = mysqli_query($connect, "SELECT `emp_id`,MONTH(`from_date`) AS `date`  FROM `emp_leaves` WHERE emp_id = '$get' AND from_date = '$presentdate' ");
$mon_fetch = mysqli_fetch_assoc($month_cal);
if (isset($mon_fetch['date'])) {
    $mon_fetch['date'];
} else {
    // SELECT emp_id, month, sum(leaves) AS fleave,tleaves, tmonth,leaves.* FROM 
    // (SELECT from_date,to_date,emp_id,leave_type,MONTH(to_date) AS tmonth, MONTH(from_date) AS month, 
    //  CASE 
    //  	WHEN MONTH(to_date)!= MONTH(from_date) THEN DATEDIFF(LAST_DAY(from_date) , from_date) +1 
    //  	ELSE DATEDIFF(to_date,from_date) + 1 
    //  	END AS leaves ,
    //  CASE
    //  	WHEN MONTH(to_date) != MONTH(from_date) THEN DAYOFMONTH(to_date)     
    //  END as tleaves
    //  FROM emp_leaves     
    // ) AS a     JOIN leaves ON a.emp_id = 'emp3'  AND ( MONTH(a.from_date) = '2' OR MONTH(a.to_date) = '2')  AND ( YEAR(a.from_date) = '2022' OR YEAR(a.to_date) = '2022') AND leaves.status = 1 AND leaves.s_no = a.leave_type
    // 	GROUP BY month
    //     ORDER BY month;

}
// SELECT month, SUM(days) FROM (SELECT MONTH(from_date) AS month, CASE WHEN MONTH(from_date) != MONTH(to_date) THEN (LAST_DAY(from_date)-from_date)+1 ELSE (to_date - from_date)+1 END AS days FROM emp_leaves) AS a GROUP BY month;
// SELECT month, sum(leaves) FROM (SELECT MONTH(from_date) AS month, CASE WHEN MONTH(to_date)!= MONTH(from_date) THEN LAST_DAY(from_date) - from_date + 1 ELSE to_date - from_date + 1 END AS leaves FROM emp_leaves) AS a GROUP BY month;



// $leave_1 = mysqli_query($connect, "SELECT emp_id, `month`, SUM(leaves) AS tot_lev, a.leave_type , leaves.*  FROM (SELECT from_date,to_date,emp_id,leave_type, CASE  WHEN LEFT(from_date,7) != LEFT(CURRENT_DATE(),7) THEN LEFT(to_date,7) ELSE LEFT(from_date,7) END  AS `month`, CASE WHEN left(to_date,7)!= left(CURRENT_DATE(),7)  THEN DATEDIFF(LAST_DAY(from_date) , from_date) +1 WHEN left(from_date,7)!= LEFT(CURRENT_DATE(),7) THEN  DAYOFMONTH(to_date) ELSE DATEDIFF(to_date,from_date) + 1 END AS leaves FROM emp_leaves ) AS a INNER JOIN leaves ON  leaves.s_no = a.leave_type  AND  a.emp_id = '$get' AND LEFT(CURRENT_DATE(),7) = a.month AND a.leave_type = 9 ");
// $leave_1_fetch = mysqli_fetch_assoc($leave_1);
echo $leave_1_fetch['tot_lev'];
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Employees</h2>
                        <br>
                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-40px);">
                            <a href="edit_employee.php?empid=<?php echo $_GET['empid']; ?>"><button type="button" class="btn btn-info btn-fw col-lg-12">Edit Employee</button></a>
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
                                                        <td><?php echo $emp_panal_fetch['emp_name']; ?></td>
                                                        <td style="width:15%"><b>Phone No.</b></td>
                                                        <td><?php echo $emp_panal_fetch['emp_mobile']; ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Employee ID</b></td>
                                                        <td><?php echo $emp_panal_fetch['emp_id']; ?></td>
                                                        <td><b>Email</b></td>
                                                        <td><?php echo $emp_panal_fetch['emp_mail']; ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Employee Designation</b></td>
                                                        <td><?php echo $emp_panal_fetch['designation_name']; ?></td>
                                                        <td><b>Pan No.</b></td>
                                                        <td><?php echo $emp_panal_fetch['emp_pan']; ?></td>
                                                    </tr>
                                                    <tr class="">
                                                        <td><b>Adhar No.</b></td>
                                                        <td><?php echo $emp_panal_fetch['emp_aadhar']; ?></td>
                                                        <td></td>
                                                        <td></td>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- ============================ -->
                        <br><br>
                        <br><br>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Salary Details</h4>
                                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-40px);">
                                            <a href="set_salary.php?empid=<?php echo $_GET['empid']; ?>"><button type="button" class="btn btn-info btn-fw col-lg-12">Set Salary</button></a>
                                        </div>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>S.No</th> -->
                                                        <th>Gross : 10000</th>
                                                        <th>Net Salary : 10000</th>
                                                        <th>PF : 10000</th>
                                                        <!-- <th>
                                                            <center>Edit</center>
                                                        </th> -->

                                                    </tr>
                                                </thead>
                                                <tbody id="holidays">
                                                    <?php
                                                    // $count = 1;
                                                    // while ($qu_fetch = mysqli_fetch_assoc($holidays)) {
                                                    //     echo "<tr>
                                                    //             <td>" . $count . "</td>
                                                    //             <td>" . $qu_fetch['date'] . "</td>
                                                    //             <td>" . $qu_fetch['reason'] . "</td>
                                                    //         </tr>";
                                                    //     $count = $count + 1;
                                                    // }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================ -->
                        <br><br>
                        <br><br>

                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="row">
                                    <div class="card-body  col-lg-6">
                                        <h4 class="card-title">Leaves Details</h4>
                                        <div class="col-sm-0" style="display: flex; justify-content: space-between; float: right; transform: translateY(-30px);">
                                            <a href="apply_leave.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-info btn-fw col-lg-12">Apply Leave</button></a>
                                        </div>
                                        <div class="table-responsive pt-3 ">
                                            <table class="table table-bordered">

                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Type Of Leaves</th>
                                                        <th>Total Leaves Available</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    while ($lea_fetch = mysqli_fetch_assoc($leave_sele)) {

                                                        $leaveID = $lea_fetch['s_no'];
                                                        $leave_1 = mysqli_query($connect, "SELECT leave_type,SUM(curr_m_leaves) AS curr_m_leaves FROM (SELECT leaves_credit,leaves_surrender,leave_type,from_date,to_date,status,CASE 
                                                    WHEN (LEFT(from_date,7) = LEFT(CURRENT_DATE(),7) AND LEFT(to_date,7) = LEFT(CURRENT_DATE(),7) )
                                                        THEN DATEDIFF(to_date,from_date)+1
                                                    WHEN LEFT(from_date,7) < LEFT(CURRENT_DATE(),7)
                                                        THEN DAYOFMONTH(to_date)
                                                    ELSE DATEDIFF(LAST_DAY(from_date),from_date)+1
                                                    END AS curr_m_leaves FROM emp_leaves WHERE emp_id = '$get' AND leave_type = $leaveID AND `status` = 1 AND ( LEFT(from_date,7) = LEFT(CURRENT_DATE(),7) OR LEFT(to_date,7) = LEFT(CURRENT_DATE(),7))) AS a
                                                    GROUP BY curr_m_leaves;");
                                                        $yearly = mysqli_query($connect, "SELECT * FROM (SELECT SUM(curr_y_leaves) AS curr_y_leaves  FROM (SELECT leaves_credit,leaves_surrender,leave_type,from_date,to_date,status,CASE 
                                                    WHEN (LEFT(from_date,4) = LEFT(CURRENT_DATE(),4) AND LEFT(to_date,4) = LEFT(CURRENT_DATE(),4) )
                                                        THEN DATEDIFF(to_date,from_date)+1
                                                    WHEN LEFT(from_date,4) < LEFT(CURRENT_DATE(),4)
                                                        THEN DAYOFMONTH(to_date)
                                                    ELSE DATEDIFF(LAST_DAY(from_date),from_date)+1
                                                    END AS curr_y_leaves FROM emp_leaves WHERE emp_id = '$get' AND leave_type = $leaveID AND `status` = 1 AND ( LEFT(from_date,4) = LEFT(CURRENT_DATE(),4) OR LEFT(to_date,4) = LEFT(CURRENT_DATE(),4))) AS a) AS b
                                                GROUP BY b.curr_y_leaves");
                                                        $yearly_fetch = mysqli_fetch_assoc($yearly);
                                                        $leave_1_fetch = mysqli_fetch_assoc($leave_1);
                                                        echo "<tr>";
                                                        echo        "<td>" . $count . "</td>"; // "-" . $lea_fetch['s_no'] . 
                                                        echo        "<td><a href='leave_details.php?id=".$leaveID."&empid=".$emp_panal_fetch['emp_id']."'>".$lea_fetch['leave_type']."</a></td>";
                                                                    
                                                        echo        "<td>" . $lea_fetch['max_in_year'] - $yearly_fetch['curr_y_leaves'] . "</td>";
                                                        $count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <!--  -->
                                            <!-- $lea_fetch['leave_type'] -->
                                            <!-- "<td>" . $lea_fetch['leave_type'] . "</td>"; -->
                                        </div>
                                    </div>
                                    <div class="card-body col-lg-6">
                                        <br>
                                        <h4 class="card-title">Holiday Details</h4>
                                        <br><br>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Date</th>
                                                        <th>Reason</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="holidays">
                                                    <?php
                                                    $count = 1;
                                                    while ($qu_fetch = mysqli_fetch_assoc($holidays)) {
                                                        echo "<tr>
                                                                <td>" . $count . "</td>
                                                                <td>" . $qu_fetch['date'] . "</td>
                                                                <td>" . $qu_fetch['reason'] . "</td>
                                                            </tr>";
                                                        $count = $count + 1;
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
                    <center>
                        <a href="terminate.php?empid=<?php echo $_GET['empid']; ?>"><button style="margin-right: 30px ;" type="button" class="btn btn-danger">Terminate</button></a>
                        <a href="employees.php"><button type="button" class="btn btn-success">Back</button></a>
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</div>