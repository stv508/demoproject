<?php
include("session.php");
include("header.php");
// hi
$designations = mysqli_query($connect, " SELECT * FROM `emp_designations`");

?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="">Add salary </h2>
            <br><br>
            <form class="form-sample" action="add_succ_emp.php" method="post">

              <div class="row">
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Select staff</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="" name="fullname" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="gender" required>
                        <option>Select</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">net salary</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="" name="aadhar" id="aadhar" maxlength="12" minlength="12" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Basic Pay</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="" name="pan" id="pan" maxlength="10" minlength="10" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">TDS</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="dob" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">EPF</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="doj" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ALLOWANCE</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile" id="mobile" maxlength="10" minlength="10" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" placeholder="Enter Email" name="email" required />
                    </div>
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" maxlength="150" id="exampleTextarea1" rows="4" placeholder="Enter Door no,Street,Area" name="address" required></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Designation</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="designation" required>
                      <option>Select</option>
                      <?php
                      while ($designationfetch = mysqli_fetch_assoc($designations))
                        // echo  "". $designationfetch['designation_id'].$designationfetch['designation_name']   ;
                        echo   "<option value='" . $designationfetch['designation_id'] . "'>" . $designationfetch['designation_name'] . "</option>";
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <center>
                <button style="margin-right: 30px ;" type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger">Cancel</button>
              </center>


          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <?php
    include("footer.php");
    ?>
    <script>
      let aadhar = document.getElementById("aadhar");
      let pan = document.getElementById("pan");
      
      // $('#mobile').keyup(function(){
        
      // });
      $('#mobile').keypress(function(e){
        // let mobile = $('#mobile').val();
        let mobile = document.getElementById('mobile').value;
        console.log(mobile);
        if(isNaN(mobile)){
          e.preventDefault();
          let mob = $('#mobile').val();

        }
      });

      aadhar.addEventListener("keypress", function(event) {
        if (event.keyCode === 48 || event.keyCode === 49 || event.keyCode === 50 || event.keyCode === 51 || event.keyCode === 52 || event.keyCode === 53 || event.keyCode === 54 || event.keyCode === 55 || event.keyCode === 56 || event.keyCode === 57) { //49 - 57

        } else {
          event.preventDefault();
        }
      });
      // $('#mobile').keyup(function(){
      //   alert("pressed");
      // });

      pan.addEventListener("keyup", function(event) {
       let cap = pan.value;
       pan.value = cap.toUpperCase();
      });
      
    </script>