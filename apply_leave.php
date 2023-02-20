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
                                    <label class="col-sm-3 col-form-label">Leaves Available</label>
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
                                <button id="apply" style="margin-right: 30px ;" type="submit" class="btn btn-success">Apply</button>

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
            $('#todate, #fromdate').keydown(function() {
                let todate = $('#todate').val();
                let fromdate = $('#fromdate').val();
                if (fromdate > todate) {
                    console.log(fromdate + "  " + todate);
                    $('#apply').prop('disabled', true);
                }
            });
            $('#leaveid').change(function(){
                let leaveid = $('#leaveid').val();
                alert(leaveid);
                $.ajax({
                    url: 'leaveid.php',
                    method: 'POST',
                    data: {
                        empid : empi,
                        leaveid : leaveid
                    }
                })
            });

            // if (isset(todate) && isset(fromdate)) {  leave_query  ajax call
            $('#apply').click(function() {
                let reason = $('#leaveid').val();
                let td = new Date($('#todate').val());
                let todate = $('#todate').val();

                let fromdate = $('#fromdate').val();
                let fd = new Date($('#fromdate').val());

                let difference = td.getTime() - fd.getTime();
                var Difference_In_Days = difference / (1000 * 3600 * 24);

                Difference_In_Days = Difference_In_Days + 1;
                console.log(todate);
                let msg = "From " + fromdate + " To " + todate + " Your Leave Request Has Been Send To Your HR";

                if (confirm(msg) == true) {

                    $.ajax({
                        url: 'leave_query.php',
                        type: 'POST',
                        data: {
                            reas: reason,
                            tdate: todate,
                            fdate: fromdate,
                            differ: Difference_In_Days,
                            empid: empi
                        },
                        success: function() {
                            // window.location.replace("emp_pannel.php?empid=<?php echo $get ?>");
                        }
                    });
                    alert("Please Wait For HR Approvel");
                }
            });
        });
    </script>