<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">View Assign Class</h4>

        <!-- Basic Layout -->
        <div class="row">

            <div class="col-xl">
                <div class="card mb-4">
                <div class="card-body">
                    <?php
                    if(isset($_REQUEST["msg"]))
                    {
                      echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                    }
                    ?>
                    <table class="table table-striped">
                      <thead>
                        <tr class="table-primary">
                          <th>#</th>
                          <th>Staff</th>
                          <th>Course Name</th>
                          <th>View Students</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sno=1;
                          include("config.php");
                          $q = "SELECT `assign_class`.*,`staff`.`name`,`staff`.`email`,`course`.`course_name` FROM `assign_class` inner join `course` on `assign_class`.`course`=`course`.`id` inner join `staff` on `assign_class`.`staff`=`staff`.`id` where `assign_class`.`staff`='$_SESSION[staff_id]'";
                          $res = mysqli_query($conn,$q);
                          while($data = mysqli_fetch_array($res)){
                        ?>
                          <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data["name"]." - ".$data["email"]; ?></td>
                            <td><?php echo $data["course_name"]; ?></td>
                            <td>
                              <a href="view_students.php?courseid=<?php echo $data['course']; ?>" class="btn btn-primary">
                                View 
                              </a>
                            </td>
                           
                          </tr>
                        <?php
                          $sno++;
                          }
                        ?>
                      </tbody>
                    </table>
                </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?php
include("footer.php");
?>