<?php
include("session.php");
include("header.php");
$basic_pay = $_POST['basic_pay'];
$get = $_GET['empid'];
$joining_info = mysqli_query($connect, "SELECT emp_doj FROM emp_personal WHERE emp_id = '$get' AND `emp_status` = 1 ");
$joining_info_fetch = mysqli_fetch_assoc($joining_info);
$joining_date = $joining_info_fetch['emp_doj'];
$salary  = mysqli_query($connect, "INSERT INTO `salary`(`emp_id`, `payroll_id`, `from_date`, `amount`, `status`) VALUES ('$get',1,'$joining_date','$basic_pay',1 )");
$select_salary = mysqli_query($connect, "SELECT amount FROM `salary` WHERE `emp_id` = '$get' AND `payroll_id` = 1 AND `from_date` = '$joining_date' AND `amount` = '$basic_pay' AND `status`  = 1");
$select_salary_fetch = mysqli_fetch_assoc($select_salary);

if(!isset($salary)){
    header("location: set_salary.php");
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Set Salary Successfull</h2>
                        <hr>
                        <br><br>
                        <form class="form-sample">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Basic Pay Per Year</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?php echo $select_salary_fetch['amount'];?>" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="emp_pannel.php?empid=<?php echo $get?>"><button type="button" class="btn btn-info">Back</button></a>
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