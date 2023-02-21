<?php 
include("session.php");
include("header.php");
$dedu_select = mysqli_query($connect, "SELECT * FROM `deduction` WHERE `status` = 1 ");

?>
<?php
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Deduction Management</h2>
                        <br>
                        <div class="col-sm-0" style="display: flex; float: right; transform: translateY(-40px);">
                            <a href="add_dedu.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Add New Deduction</button></a>
                        </div>
                        <hr>
                        <p class="card-description"></p>
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
                                                    while($dedu_select_fetch = mysqli_fetch_assoc($dedu_select)){
                                                        echo "<tr>
                                                        <td>".$count."</td>
                                                        <td>".$dedu_select_fetch['deduction_name']."</td>
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
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>