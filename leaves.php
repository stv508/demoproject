<?php
include("session.php");
include("header.php");
$leave_sele = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `status` > 0 ");
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">Leaves Management</h3>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-lg-12 stretch-card">
                                        <div class="card-body">
                                            <h4 class="">Leave Details</h4>
                                            <div class="col-sm-0" style="display: flex; justify-content: space-between; float: right; transform: translateY(-40px);">
                                                <a href="set_leaves.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Set Leaves</button></a>
                                            </div><br><br>
                                            <div class="main-panel">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-lg-12 grid-margin stretch-card">
                                                            <div class="card-body">
                                                                <div class="table-bordered">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                                <th>Type Of Leaves</th>
                                                                                <th>Maximum Leaves Per Year</th>
                                                                                <th>Maximum Leaves Per Month</th>
                                                                                <th>Carry Forword</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $count = 1;
                                                                            function CarryFor($status){
                                                                                if($status == 1){
                                                                                    echo "<td>No</td>";
                                                                                }
                                                                                elseif($status == 2){
                                                                                    echo "<td>Yes</td>";                                                                                }
                                                                            }
                                                                            while ($lea_fetch = mysqli_fetch_assoc($leave_sele)) {
                                                                                echo "<tr>
                                                                                <td>" . $count . "</td>
                                                                                <td>" . $lea_fetch['leave_type'] . "</td>
                                                                                <td>" . $lea_fetch['max_in_year'] . "</td>
                                                                                <td>" . $lea_fetch['max_in_month'] . "</td>";
                                                                                CarryFor($lea_fetch['status']);
                                                                                echo "<td><center><a href='set_leaves_edit.php?leaveid=" . $lea_fetch['s_no'] . "'><i class='icon-trash text-danger'></i></a></center></td>
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
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</div>