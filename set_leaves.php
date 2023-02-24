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
                        <h2 class="">Set Leaves</h2>
                        <br><br>
                        <form action="set_leaves_succ.php" method="post">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type of Leave</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="leavetype" placeholder="Enter Type Of Leave" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Year</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="2" class="form-control" name="leavesYear" id="mly" placeholder="Enter Maximum Leaves Per Year" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Maximum Leaves Per Month</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" maxlength="2" id="mlm" name="leaveMonth" placeholder="Enter Maximum Leaves Per Month" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Carry Forword</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="carry" required>
                                            <option></option>
                                            <option value="1">No</option>
                                            <option value="2">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                                <a href="leaves.php"><button type="button" class="btn btn-danger">Cancel</button></a>
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
    <script>
        noAlpha(document.getElementById("mly"));
        noAlpha(document.getElementById("mlm"));
    </script>