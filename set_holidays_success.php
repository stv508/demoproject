<?php
include("session.php");
include("header.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hoddate = $_POST["hoddate"];
    $reason = $_POST["reason"];

    $query12 = mysqli_query($connect,"INSERT INTO `holidays`(`date`, `reason`) VALUES ('$hoddate','$reason')");
    $success = "UnSuccessfull";
    if($query12){
        $success = "Successfully Added Holiday";
    }
    $get =mysqli_query($connect,"SELECT  `date`, `reason` FROM `holidays` WHERE `date` = '$hoddate' AND reason = '$reason'");
    $getfetch = mysqli_fetch_assoc($get);
    
}

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">
                            <?php
                            echo $success; 
                            ?>
                        </h2>
                        <br><br>
                        <form>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Date</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value=<?php echo $getfetch['date'] ?> disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Reason</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"  name="reason" value=<?php echo $getfetch['reason'] ?>   disabled/>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="holidays.php"><button style="margin-right: 30px ;" type="button" class="btn btn-success">Back</button></a>
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