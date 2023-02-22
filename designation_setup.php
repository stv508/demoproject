<?php 
include("session.php");
include("header.php");
?>
<?php
$select_desgination =mysqli_query($connect, "SELECT * FROM `emp_designations`");
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
                                
                                    <div class="col-lg-12 stretch-card">
                                        <div class="card-body">
                                            <h4 class="">Available Designations</h4>
                                            <div class="col-sm-3" style="display: flex; justify-content: space-between; float: right; transform: translateY(-40px);">
                                                <a href="create_desig.php"><button type="button" class="btn btn-info btn-fw col-lg-12">Create Designations</button></a>
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
                                                                                    <th style="width: 200px;">S.No</th>
                                                                                    <th>Designation</th>
                                                                                    <th style="width: 100px;"><center>Edit</center></th>
                                                                                    <th style="width: 100px;"><center>Delete</center></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $count = 1;
                                                                                while ($select_desgination_fetch = mysqli_fetch_assoc($select_desgination)) {
                                                                                    echo "<tr>
                                                                                          <td>".$count."</td>
                                                                                          <td>".$select_desgination_fetch['designation_name']."</td>
                                                                                          <td><center><a href='edit_desig.php'><i class='fa-regular text-info fa-pen-to-square' id=''></i></a></center></td>
                                                                                          <td><center><button type='button' class='btn btn-light' data-toggle='modal' data-target='#exampleModalCenter'>
                                                                                          <i class='icon-trash text-danger'></i>
                                                                                          </button></center></td>
                                                                                          
                                                                                          
                                                                                      </tr>";
                                                                                    $count = $count + 1;
                                                                                }
                                                                                ?>

                                                                                <!-- Modal -->
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
                                                                                                  ...
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                                                                                                  <button type="button" class="btn btn-secondary">Cancel</button>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div>
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

        <?php
        include("footer.php");
        ?>
    </div>
    
    <!-- 
    ArrayList<Integer>list=new ArrayList<>();
    int arr = list.add(var);
    ArrayList <Integer>list1=removeDuplicates(list); 
-->


