<?php
include("session.php");
include("header.php");
// hi
$designations = mysqli_query($connect, " SELECT * FROM `emp_designations`");

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Set Salary</h2>
                        <hr>
                        <br><br>
                        <form class="form-sample" action="set_salary_succ.php" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Basic Pay Per Year</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pay" placeholder="Enter Employee Basic Pay" name="basic_pay" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Basic Pay Per Month</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="basic" class="form-control" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </center>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script>
        $('#pay').keyup(function(event) {
            var pay = $('#pay').val();
            if (isNaN(pay)) {
                $('#pay').val("");
                $('#basic').val("");
            }
            else{
                var basic = pay/12;
                $('#basic').val(basic);
            }
        });
    </script>