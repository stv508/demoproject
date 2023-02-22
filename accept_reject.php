<?php
// Approvel1
function AcceptAndReject($call, $value)
{
    echo "<div class='modal fade' id='Approvel" . $call . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
<div class='modal-dialog modal-dialog-centered' role='document'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='exampleModalLongTitle'>Accept Request</h5>
      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    <div class='modal-body'>
      <p class='h5'>Do You Really Want To Accept val=" . $value . "</p>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
      <button id='ok".$call."' type='button' class='btn btn-info'>Ok</button>
    </div>
  </div>
</div>
</div>

<div class='modal fade' id='deny" . $call . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
<div class='modal-dialog modal-dialog-centered' role='document'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='exampleModalLongTitle'>Reject Request</h5>
      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    <div class='modal-body'>
      <p class='h5' >Do You Really Want To Deny val=" . $value . "</p>
    </div>
    <div class='modal-footer'>
      <button type='button' value='" . $value . "' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
      <button id='cancel" . $call . "'  type='button' class='btn btn-danger'>Ok</button>
    </div>
  </div>
</div>
</div>

<script>    
    $('#cancel".$call."').click(function() {
        console.log('" . $value . "');
        $.ajax({
            url: 'rej_ajax.php',
            method: 'POST',
            data : {emp_leave_sno: ".$value."},
            success: function(){
                window.location.replace('leave_requests.php');                
            }
        });
    });
    $('#ok".$call."').click(function(){
        console.log('".$value."');
        $.ajax({
            url: 'accp_ajax.php',
            method :'POST',
            data :{leave_sno: ".$value."},
            success:function(){
            window.location.replace('leave_requests.php');
            }
        })

    }
);
    
</script>";
}
?>
<script src="vendors/base/vendor.bundle.base.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script src="js/template.js"></script>
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>