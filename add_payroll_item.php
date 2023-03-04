<?php
include("session.php");
include("header.php");
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
                                        <form action="add_payroll_item_succ.php" method="post">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Name Of Payroll</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" placeholder="Enter Payroll Name" name="payroll_name" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Type Of Payroll</label>
                                                    <div class="col-sm-8 ">
                                                        <select class="form-control" name="payroll_type" required>
                                                            <option>Select</option>
                                                            <option value="e">Earning</option>
                                                            <option value="d">Deduction</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Category</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="payroll_cat" required>
                                                            <option>Select</option>
                                                            <option value="m">Monthly remuneration</option>
                                                            <option value="a">Additional remuneration</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Unit Calculation</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="unitcal" name="unit_cal" required>
                                                            <option>Select</option>
                                                            <option value="p">Yes</option>
                                                            <option value="a">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10" id="unitper">
                                                <!-- percentage -->
                                            </div>
                                            <div class="col-md-10" id="unitamt">
                                                <!-- amount -->
                                            </div>
                                            <div class="col-md-10" id="">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Unit Type</label>
                                                    <div class="col-sm-8">
                                                    <select class="form-control" id="" name="unit_type" required>
                                                            <option>Select</option>
                                                            <option value="f">Fixed</option>
                                                            <option value="c">Flexible</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Create</button>
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
    $('#unitcal').change(function(){
        var unitcal = $('#unitcal').val();
        var amtdiv = "<div class='form-group row'><label class='col-sm-4 col-form-label'>Unit Amount</label><div class='col-sm-8'><input type='text' class='form-control' placeholder='Enter Unit Amount In Rupees' name='amount' required /></div></div>";
        var perdiv = "<div class='form-group row'><label class='col-sm-4 col-form-label'>Unit Percentage</label><div class='col-sm-8'><input id='unit_calc' type='text' class='form-control' placeholder='Enter Unit Amount In Percentage' name='amount' maxlength='5' required /></div></div>";
        if(unitcal == "p"){
            // console.log(unitcal);
            $('#unitper').html(perdiv);
        }
        else if(unitcal == "a"){
            console.log(unitcal);
            $('#unitper').html(amtdiv);
        }
        else{
            $('#unitper').html("");
        }
        




        
        $('#unit_calc').keyup(function(){
            var per = $("#unit_calc").val();

            if(per > 100 || per < 0 || isNaN(per)){
                console.log(per);
                $('#unit_calc').val("");
            }
        });
    });         

</script>