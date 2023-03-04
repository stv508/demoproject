<?php
include("session.php");
include("header.php");
$get = $_GET['empid'];
$find_emp = mysqli_query($connect, "SELECT * FROM `salary` WHERE `status` = 1 AND emp_id = '$get' ");
$find_emp_rows = mysqli_num_rows($find_emp);
if($find_emp_rows > 0){
    $find_emp_fetch = mysqli_fetch_assoc($find_emp);
}
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
                        <form class="form-sample" action="set_salary_succ.php?empid=<?php echo $get; ?>" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Basic Pay Per Year</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pay" placeholder="Enter Employee Basic Pay" name="basic_pay" value="<?php echo $find_emp_fetch['amount']?>" required />
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
                                <a href="emp_pannel.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
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
                var basic = parseFloat(pay/12);
                basic = basic.toFixed(2);
                $('#basic').val(basic);
            }
        });
    </script>