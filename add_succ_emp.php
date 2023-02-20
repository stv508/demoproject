<?php
include("session.php");
include("header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name   =  $_POST['fullname'];
    $gender =  $_POST["gender"];
    $aadhar =  $_POST["aadhar"];
    $dob    =  $_POST["dob"];
    $doj    =  $_POST["doj"];
    $mobile =  $_POST["mobile"];
    $email  =  $_POST["email"];
    $address =  $_POST["address"];
    $designation = $_POST["designation"];
    $pan     = $_POST["pan"];
    $idquery = mysqli_query($connect, "SELECT * FROM `emp_personal` ");
    $idrows = mysqli_num_rows($idquery);
    $id = "EMP" . ($idrows + 1);

    mysqli_query($connect, "START TRANSACTION");
    $queryPM  = mysqli_query($connect, "INSERT INTO `emp_PM`( `emp_id`, `emp_mobile`, `emp_mail`, `status`) VALUES ('$id','$mobile','$email','1') ");
    $query_personal = mysqli_query($connect, "INSERT INTO `emp_personal`( `emp_id`, `emp_name`, `emp_gender`, `emp_dob`, `emp_doj`, `emp_aadhar`, `emp_pan`, `emp_add`, `emp_status`) VALUES  ('$id','$Name','$gender','$dob',' $doj','$aadhar','$pan','$address','1')");
    $query_pro = mysqli_query($connect, "INSERT INTO `emp_professional`(`emp_id`, `emp_designation`, `emp_status`) VALUES ('$id','$designation','1')");

    if ($queryPM && $query_personal && $query_pro) {
        mysqli_query($connect, "COMMIT");
        $insertdata = mysqli_query($connect, "SELECT * FROM `emp_personal`,`emp_professional`,`emp_designations`,`emp_PM` WHERE emp_professional.emp_id = emp_personal.emp_id AND emp_professional.emp_designation = emp_designations.designation_id AND emp_PM.emp_id = emp_professional.emp_id AND emp_PM.status = 1 AND emp_professional.emp_status = 1 AND emp_personal.emp_id = '$id' ");
        $insertFetch = mysqli_fetch_assoc($insertdata);
    } else {
        mysqli_query($connect, "ROLLBACK");
    }
}
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Add Employee</h2>
                        <br><br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value=<?php echo $insertFetch['emp_name']; ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value=<?php if ($insertFetch['emp_gender'] == 1) { echo "Male"; } else { echo "Female"; } ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Aadhar Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value=<?php echo $insertFetch['emp_aadhar']; ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">PAN Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"   value=<?php echo $insertFetch['emp_pan']; ?> disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date Of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value=<?php echo $insertFetch['emp_dob']; ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date Of Joining</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value=<?php echo $insertFetch['emp_doj']; ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value=<?php echo $insertFetch['emp_mobile']; ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" value=<?php echo $insertFetch['emp_mail']; ?> disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" disabled><?php echo $insertFetch['emp_add']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Designation</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value=<?php echo $insertFetch['designation_name']; ?> disabled />
                                </div>
                            </div>
                        </div>
                        <center>
                            <a href="employees.php"> <button style="margin-right: 30px ;" type="button" class="btn btn-success">Back</button></a>
                        </center>


                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include("location: footer.php");

        ?>