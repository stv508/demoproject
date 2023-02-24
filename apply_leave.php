<?php
include("session.php");
include("header.php");
$leave_type = mysqli_query($connect, "SELECT * FROM `leaves` WHERE `status` = 1");
$get = $_GET['empid'];
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Apply For Leave</h2>
                        <br><br>
                        <!-- action="leave_query.php?empid=<?php //echo $get 
                                                            ?>" method="post" -->
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type of Leave</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="leaveid" required>
                                            <option value=""></option>
                                            <?php
                                            while ($leave_type_fetch = mysqli_fetch_assoc($leave_type)) {
                                                echo "<option value='" . $leave_type_fetch['s_no'] . "'>" . $leave_type_fetch['leave_type'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Leaves Available In This Year</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="la" class="form-control" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="fromdate" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="todate" required />
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button id="apply" style="margin-right: 30px ;" type="button" class="btn btn-success">Apply</button>
                                <a href="emp_pannel.php?empid=<?php echo $get; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    //   $from = Document.getElementById('fromdate');
    //   $to =Document.getElementById('todate');
    //   $diff =Date_diff($to,$from);
    //   echo $diff;
    ?>
    <script>
        $(document).ready(function() {
            let empi = "<?php echo $get ?>";
            $('#leaveid').change(function() {
                let leaveid = $('#leaveid').val();
                $.ajax({
                    url: 'leaveid.php',
                    method: 'POST',
                    data: {
                        empid: empi,
                        leaveid: leaveid
                    },
                    success: function(data) {
                        let leave = data.split("*")
                        $('#la').val(leave[0]);

                        // alert(leaveid);
                    }
                })
            });
            $('#apply').click(function() {
                var fromdate = $('#fromdate').val();
                var todate = $('#todate').val();
                var leaveid = $('#leaveid').val();
                if ((fromdate) && (todate) && (leaveid)) {
                    var date1 = new Date(fromdate);
                    var date2 = new Date(todate);
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24)) + 1;
                    if (Difference_In_Days > 0) {
                        console.log("Total " + " is: " + Difference_In_Days);
                        $.ajax({
                            url: "leave_query.php",
                            method: "POST",
                            data: {
                                fromdate: fromdate,
                                todate: todate,
                                datediff: Difference_In_Days,
                                empid: empi,
                                leaveid: leaveid
                            },
                            // success: function() {
                                // location.replace("apply_leave_succ.php");
                            // }
                        });
                    } else {
                        alert("Todate Must Be Greater Than Fromdate");
                        fromdate = $('#fromdate').val("");
                        todate = $('#todate').val("");
                    }
                } else {
                    alert("Please Enter The Values");
                }

            });
        });
    </script>