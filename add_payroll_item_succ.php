<?php
include("session.php");
include("header.php");
$payroll_name = $_POST['payroll_name']; // pf
$payroll_type = $_POST['payroll_type']; // deduction (e)d
$payroll_cat = $_POST['payroll_cat']; // monthly (m)a
$unit_cal = $_POST['unit_cal']; // percentage(p) amount
$amount = $_POST['amount']; // 100/- or 10%
$unit_type = $_POST['unit_type']; // fixed (f) change
$payroll_insert = mysqli_query($connect, "INSERT INTO `payroll`(`payroll_name`, `payroll_type`, `category`, `unit_calculation`, `amount`, `unit_type`, `status`) VALUES ('$payroll_name','$payroll_type','$payroll_cat','$unit_cal','$amount','$unit_type',1)");
$payroll_select = mysqli_query($connect, "SELECT * FROM `payroll` WHERE `payroll_name` = '$payroll_name' AND `payroll_type` = '$payroll_type' AND `category` = '$payroll_cat' AND `unit_calculation` = '$unit_cal' AND `amount` = '$amount' AND `unit_type` = '$unit_type' AND `status` = 1 ");
$payroll_select_fetch = mysqli_fetch_assoc($payroll_select);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Add New Payroll Item</h2>
                        <br>
                        <hr>
                        <p class="card-description"></p>
                        <div class="table-responsive">
                            <div class="col-lg-12 stretch-card">
                                <!-- <div class="card"> -->
                                <div class="card-body">
                                    <div class="table-responsive pt-3">
                                        <form action="add_earn_succ.php" method="post">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Name Of Payroll</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $payroll_select_fetch['payroll_name'] ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Type Of Payroll</label>
                                                    <div class="col-sm-8 ">
                                                        <input type="text" class="form-control" value="<?php if($payroll_select_fetch['payroll_type'] == "e"){ echo "Earning";}else{echo "Deduction";} ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Category</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php  if($payroll_select_fetch['category'] == "m"){ echo "Monthly Remunaration";}else{echo "Yearly Remunaration";}?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Unit Calculation</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php if($payroll_select_fetch['unit_calculation'] == "p"){ echo "Yes";}else{echo "No";} ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10" id="unitper">
                                                <!-- percentage -->
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?php if($payroll_select_fetch['unit_calculation'] == "a"){ echo "Amount";}else{echo "Percentage";} ?></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $payroll_select_fetch['amount'];?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10" id="unitamt">
                                                <!-- amount -->
                                            </div>
                                            <div class="col-md-10" id="">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Unit Type</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php if($payroll_select_fetch['unit_type'] == "f"){echo "Fixed";}else{echo "Flexible";} ?>" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <a href="payroll_items.php"><button type="button" class="btn btn-danger">Cancel</button></a>
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
    <script>
        // $('#unitcal').change(function(){
        //     var unitcal = $('#unitcal').val();
        //     var amtdiv = "<div class='form-group row'><label class='col-sm-4 col-form-label'>Unit Amount</label><div class='col-sm-8'><input type='text' class='form-control' placeholder='Enter Unit Amount In Rupees' name='earning' disabled /></div></div>";
        //     var perdiv = "<div class='form-group row'><label class='col-sm-4 col-form-label'>Unit Percentage</label><div class='col-sm-8'><input type='text' class='form-control' placeholder='Enter Unit Amount In Percentage' name='earning' disabled /></div></div>";
        //     if(unitcal == 1){
        //         console.log(unitcal);
        //         $('#unitper').html(perdiv);
        //     }
        //     else if(unitcal == 2){
        //         console.log(unitcal);
        //         $('#unitper').html(amtdiv);
        //     }
        //     else{
        //         $('#unitper').html("");
        //     }

        // });
    </script>