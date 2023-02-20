<?php
include("session.php");
include("header.php");
$reason = mysqli_query($connect , "SELECT * FROM `reason`");

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Set Holidays</h2>
                        <br><br>
                        <form action="hs_succ.php" method="post">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="hsdate" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="reason" id="reason" required>
                                            <option>Select</option>
                                            <?php
                                            while($reasonFetch = mysqli_fetch_assoc($reason)){
                                                echo "<option value='".$reasonFetch['s_no']."'>".$reasonFetch['reason_name']."</option>";
                                            }
                                            ?>
                                            <option value="0">Custom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10" id="custom"></div>
                            <center>
                                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                                <a href="hs.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let reason = document.getElementById("reason");

    function change() {
        // console.log(reason.value);
        if (reason.value == 0) {
            document.getElementById("custom").innerHTML += "<div class='form-group row'><label class='col-sm-3 col-form-label'>Custom Reason</label><div class='col-sm-4'><input type='text' name='custom' class='form-control'  required /></div></div>";
        } else {
            document.getElementById("custom").innerHTML = "";

        }
    }
    reason.onchange = function() {
        change()
    };
</script>




<!-- 
<div class='col-md-10'>
    <div class='form-group row'><label class='col-sm-3 col-form-label'>Custom Reason</label>
        <div class='col-sm-9'></div>
    </div>
</div> -->