<?php
include("session.php");
include("header.php");
?>
<?php
$select_desgination = mysqli_query($connect, "SELECT * FROM (SELECT emp_designations.*,emp_professional.emp_id FROM `emp_designations` LEFT JOIN `emp_professional`  ON emp_designations.designation_id = emp_professional.emp_designation GROUP BY emp_designations.designation_id) AS a WHERE `status` = 1 ");

?>





<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="">Designation Setup</h3>
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-7 stretch-card">
                                    <div class="card-body">
                                        <h4 class="">Available Designations</h4>
                                        <div class="col-sm-3" style="display: flex; justify-content: space-between; float: right; transform: translateY(-40px);">
                                            <a href="create_desig.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Create Designations</button></a>
                                        </div><br><br>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px;">S.No</th>
                                                        <th>Designation</th>
                                                    
                                                        <th style="width: 100px;">
                                                            <center>Delete</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    while ($select_desgination_fetch = mysqli_fetch_assoc($select_desgination)) {
                                                        $disabled = "enabled";
                                                        echo "<tr>";
                                                        echo        "<td>" . $count . "</td>";
                                                        echo        "<td class='desgname' id='desg".$select_desgination_fetch['designation_id']."'>" . $select_desgination_fetch['designation_name'] . "</td>";
                                                        if($select_desgination_fetch['emp_id'] != null){
                                                            $disabled = "disabled";
                                                        }
                                                        echo        "<td><center><button ".$disabled." type='button' value='".$select_desgination_fetch['designation_id']."'     id='eld' class='btn btn-light' data-toggle='modal' data-target='#exampleModalCenter'><i class='icon-trash text-danger'></i></button></center></td>";
                                                        echo   "</tr>";

                                                  
                
                                                        $count = $count + 1;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Are you Sure want to Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="msg"></p>                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"  id="delete1" class="btn btn-danger">Delete</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
</div>

<script>
    $("[id^=eld]").click(function(){
        var a = $(this).val();
        $('#delete1').val(a);
        var b = $(this).closest('td').prev().text();
        $('#msg').text(b);
    });
    $('#delete1').click(function(){
        var c = $('#delete1').val();
        $.ajax({
            url: "delete_desg.php",
            method: "POST",
            data: {
                desgid : c
            },
            success : function(){
                location.reload(true);
            }
        });
    });
</script>