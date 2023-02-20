<?php
include("session.php");
include("header.php");
include("encrypt.php");
$get = $_GET["empid"];
// $get = openssl_decrypt($get, $method, $key, 0, $iv);
$editSel = mysqli_query($connect, "SELECT * FROM `emp_PM` WHERE `emp_id` = '$get' AND `status` = 1");
$editFetch = mysqli_fetch_assoc($editSel);

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Edit Employee</h2>
                        <br><br>
                        <form action="edit_employee_succ.php?empid=<?php echo $get; ?>" method="post">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Change Mobile Number</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="10" class="form-control" placeholder="New Mobile Number" id="mobile" name="cmn" value="<?php echo $editFetch['emp_mobile'];?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Change Email</label>
                                    <div class="col-sm-4">
                                        <input type="mail" class="form-control" placeholder="Change Mail" name="ce" value="<?php echo $editFetch['emp_mail'];?>" required />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Save Changes</button>
                                <a href="emp_pannel.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-danger">Back</button></a>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      
      
      const mobile = document.getElementById("mobile");
      mobile.addEventListener("keypress", function(event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.keyCode === 48 || event.keyCode === 49 || event.keyCode === 50 || event.keyCode === 51 || event.keyCode === 52 || event.keyCode === 53 || event.keyCode === 54 || event.keyCode === 55 || event.keyCode === 56 || event.keyCode === 57) { //49 - 57

        } else {
          event.preventDefault();
        }
      });
    </script>