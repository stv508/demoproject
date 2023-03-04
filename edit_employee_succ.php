<?php
include("session.php");
include("header.php");
// include("encrypt.php");
echo $get = $_GET['empid'];
// $get = decrypt($get);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo $CMN = $_POST['cmn'];
    echo $CE = $_POST['ce'];
    if(isset($get)){
        mysqli_query($connect, "START TRANSACTION");
        $statusupdate = mysqli_query($connect , "UPDATE `emp_PM` SET `status`= 0 WHERE `emp_id` = '$get' AND `status` = 1 ");
        $insertEM = mysqli_query($connect, "INSERT INTO `emp_PM`(`emp_id`, `emp_mobile`, `emp_mail`, `status`) VALUES ('$get','$CMN','$CE',1)");
        if($statusupdate && $insertEM){
            echo "transaction working";
            mysqli_query($connect, "COMMIT");
            $EMselect = mysqli_query($connect , "SELECT * FROM `emp_PM` WHERE `emp_id` = '$get' AND `status`= 1 ");
            $EMfetch = mysqli_fetch_assoc($EMselect);
        }
        else{
            echo "transaction not working";
            mysqli_query($connect, "ROLLBACK");
            header("location: edit_employee.php");
        }
    }
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Edit Employee Successful</h2>
                        <br><br>
                        <form action="edit_employee_succ.php" method="post">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Change Mobile Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  value="<?php echo $EMfetch['emp_mobile'];?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Change Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $EMfetch['emp_mail'];?>" disabled />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="emp_pannel.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-danger">Back</button></a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</div>