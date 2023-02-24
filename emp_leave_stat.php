<?php
include("session.php");
include("header.php");
include("accept_reject.php");
$leave_app = mysqli_query($connect, "SELECT emp_leaves.s_no,emp_leaves.emp_id,emp_personal.emp_name,leaves.leave_type,emp_leaves.from_date,emp_leaves.to_date, DATEDIFF(to_date,from_date)+1 As days,emp_leaves.status FROM `emp_leaves`,`emp_personal`,`leaves` WHERE emp_personal.emp_id = emp_leaves.emp_id AND emp_leaves.leave_type=leaves.s_no AND leaves.status=1 AND emp_leaves.no_of_days IS NOT NULL  AND emp_leaves.from_date > CURRENT_DATE() ");

?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="">Leave Requests</h2>
            <hr>
            <br>
            <div class="col-lg-12 stretch-card">
              <div class="table-responsive ">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 50px;"> S.No</th>
                      <th>
                        <center>Employee ID</center>
                      </th>
                      <th>
                        <center>Employee Name</center>
                      </th>
                      <th>
                        <center>Type Of Leave</center>
                      </th>
                      <th>
                        <center>From Date</center>
                      </th>
                      <th>
                        <center>To Date</center>
                      </th>
                      <th>
                        <center>No.of Days</center>
                      </th>
                      <th colspan="2">
                        <center>Status</center>
                      </th>
                    </tr>
                   </thead> 
                  <tbody>
                    <?php
                    $count = 1;
                    while ($leave_app_fetch = mysqli_fetch_assoc($leave_app)) {
                      echo "<tr>
                              <td><center>" . $count . "</center></td>
                              <td><center>" . $leave_app_fetch['emp_id'] . "</center></td>
                              <td><center>" . $leave_app_fetch['emp_name'] . "</center></td>
                              <td><center>" . $leave_app_fetch['leave_type'] . "</center></td>
                              <td><center>" . $leave_app_fetch['from_date'] . "</center></td>
                              <td><center>" . $leave_app_fetch['to_date'] . "</center></td>
                              <td><center>" . $leave_app_fetch['days'] . "</center></td>";
                            //   <td><center>" . $leave_app_fetch['status'] . "</center></td>";
                              
                              if($leave_app_fetch['status'] == 1){
                                echo "<td><center>  <button type='button' class='btn btn-success'>Approved</button></center></td>";
                              }
                              else if($leave_app_fetch['status'] == NULL){
                                  echo "<td><center>  <button type='button' class='btn btn-danger'>Rejected</button></center></td>";
                                }        
                              else if($leave_app_fetch['status'] == 0){
                                echo "<td><center>  <button type='button' class='btn btn-warning'>Pending</button></center></td>";
                              }
                           echo " </tr>";                            
                            AcceptAndReject(($count-1),$leave_app_fetch['s_no']);
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

<!--       
      <div class="modal fade" id="Approvel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Accept Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="h5">Do You Really Want To Accept</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="ok" type="button" class="btn btn-info">Ok</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Reject Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="h5" >Do You Really Want To Deny</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="no" value="one" type="button" class="btn btn-danger">Ok</button>
            </div>
          </div>
        </div>
      </div> -->


    </div>  
  </div>

  <?php
  include("footer.php");
  ?>
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Launch demo modal</button> -->
  <!-- Modal -->

  <script>
    // $deny = $('#den-bnt');
    // $('#appro-bnt').click(function(){
    //   console.log($('#appro-bnt').val());
    // });
    
    // $('#no').click(function(){
    //   console.log($('#no').val());
    // });
    // $('#no').click(function(){
    //   console.log("$('#no').val()");
    // });
    <?php 
    // for($i=0; $i<$count-2; $i++){
    //   // echo "console.log(".$i.");";
    //   echo  "$(`#den-".($i+1)."`).click(function(){
    //     console.log($(`#den-".($i+1)."`).val());
    //     let pass = $(`#den-".($i+1)."`).val();
    //     $('#no').click(function(){
    //       console.log('ok');
    //       $.ajax({
    //         url: 'approve.php',
    //         method: 'POST',
    //         data : {leave_app_id: pass },
    //         success: function(){
    //           window.location.replace('home.php');
              
    //         }
    //       });
    //     });
        
    //   });";
    //   echo  "$(`#appr-".($i+1)."`).click(function(){
    //     console.log($(`#appr-".($i+1)."`).val());
    //   });";

    // }
    // ?>
    
    
  </script>
  