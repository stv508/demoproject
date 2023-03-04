<?php
include("session.php");
include("header.php");
$desg_name = $_POST['desg_name'];
$error = "Unsuccessfull";
$des_insert  = mysqli_query($connect, "INSERT INTO `emp_designations`  (`designation_name`) VALUES ('$desg_name') ");
if(isset($des_insert)){
    $error = "Designation Creation Successfull";
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class=""><?php echo $error ?></h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Designation</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="reason" value = "<?php echo $desg_name ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <center>                
                                <a href="designation_setup.php"><button type="button" class="btn btn-danger">Back</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("footer.php");
    ?>