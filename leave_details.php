<?php
include("session.php");
include("header.php");
 $get = $_GET['empid'];
 $get_id = $_GET['id'];
// include("encrypt.php");
$emp_list = mysqli_query($connect, "SELECT * FROM `emp_leaves` WHERE emp_id ='$get' AND leave_type ='$get_id' and from_date IS NOT NULL;");
$num= mysqli_num_rows($emp_list);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Leave Details</h2>
                        <div class="col-sm-4" style="display: flex; justify-content: space-between; float: right; transform: translateY(-40px);">
                            <!-- <input type="text" class="form-control col-sm-7" id="exampleInputUsername2" placeholder="Search Employee"> -->
                            <!-- <a href="add_employees.php"><button type="button" class="btn btn-info btn-fw col-lg-10">+Add Employee</button></a> -->
                        </div>

                        <p class="card-description"></p>
                        <br>
                        <hr>
                        <div class="table-responsive">
                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Leave Type </th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>No.of days</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($num >0){
                                    $count = 1;
                                    while ($emp_fetch = mysqli_fetch_assoc($emp_list)) {
                                        // $enc = ;
                                        echo "<tr>
                                                <td>" . $count . "</td>
                                                <td><a href='emp_pannel.php?empid=".$emp_fetch['emp_id']. "'>" . $emp_fetch['emp_id'] . "</a></td>
                                                <td>" . $emp_fetch['from_date'] . "</td>
                                                <td>" . $emp_fetch['to_date'] . "</td>
                                                <td>" . $emp_fetch['no_of_days'] . "</td>
                                                <td>" . $emp_fetch['status'] . "</td>
                                            </tr>";
                                        $count = $count + 1;
                                    }
                                }
                                else{
                                  echo   "<tr>
                                        <td></td>
                                        <td></td>
                                        <td><center><h3> No Leaves </h3></center></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    
                                        
                                        
                                    
                                    
                                    
                                    
                                    </tr>";
                                    
                                }

                                    ?>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        <center>
                
                <a href="emp_pannel.php?empid=<?php echo $get?>"><button type="button" class="btn btn-danger">Back</button></a>
        </center>
    </div>
    
<?php
include("footer.php")
?>