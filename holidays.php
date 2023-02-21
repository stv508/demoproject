<?php
include("session.php");
include("header.php");
$presentYear  = date("Y");
$holidays = mysqli_query($connect, "SELECT * FROM `holidays` WHERE LEFT(date,4) = '$presentYear' AND `status` = 1 ");
// $holi_fetch = mysqli_fetch_assoc($holidays);
$only_years = mysqli_query($connect, "SELECT  DISTINCT LEFT(date,4) AS `only_year` FROM `holidays` ");

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">Holiday Management</h3>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="col-lg-12 stretch-card">
                                        <div class="card-body">
                                            <h4 class="">Holiday Details</h4>
                                            <div class="col-sm-3" style="display: flex; justify-content: space-between; float: right; transform: translateY(-40px);">
                                                <select id="years" class="form-control" name="designation" style="margin-right: 50px;">
                                                    <?php
                                                    while ($only_yearFetch = mysqli_fetch_assoc($only_years)) {
                                                        echo "<option value='" . $only_yearFetch['only_year'] . "'>" . $only_yearFetch['only_year'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <a href="set_holidays.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Set Holidays</button></a>
                                            </div><br><br>
                                            <div class="main-panel">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-lg-12 grid-margin stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">

                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>S.No</th>
                                                                                    <th>Date</th>
                                                                                    <th>Reason</th>
                                                                                    <th>
                                                                                        <center>Edit</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Delete</center>
                                                                                    </th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="holidays">
                                                                                <?php
                                                                                $count = 1;
                                                                                while ($qu_fetch = mysqli_fetch_assoc($holidays)) {
                                                                                    echo "<tr>
                                                                                          <td>" . $count . "</td>
                                                                                          <td>" . $qu_fetch['date'] . "</td>
                                                                                          <td>" . $qu_fetch['reason'] . "</td>
                                                                                          <td><center><a href='set_holidays_edit.php?holidayid=" . $qu_fetch['s.no'] . "'><i class='fa-regular fa-pen-to-square'></i></a></center></td>
                                                                                          <td><center><i class='icon-trash text-danger'></center></td>
                                                                                      </tr>";
                                                                                    $count = $count + 1;
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    include("footer.php");
    ?>
    <script>
        $(document).ready(function() {
            //$("#holidays").hide();
            $('#years').change(function() {
                let holidays = document.getElementById("years").value;
                $.ajax({
                    url: 'holi_prev.php',
                    type: 'POST',
                    data: {
                        holi_year: holidays
                    },
                    success: function(data) {
                        document.getElementById("holidays").innerHTML = data;
                    }
                })

            })

        });
        // var date = new Date();
        // console.log(date);
    </script>







    <!-- 
    ArrayList<Integer>list=new ArrayList<>();
    int arr = list.add(var);
    ArrayList <Integer>list1=removeDuplicates(list); 
-->