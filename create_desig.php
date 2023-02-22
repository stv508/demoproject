<?php
include("session.php");
include("header.php");

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Create Designation</h2>
                        <br><br>
                        <form action="set_designation_success.php" method="post">
                           
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Designation</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="reason" placeholder="Add Designation" required />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                                <a href="designation_setup.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>