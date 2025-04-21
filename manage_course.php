<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Manage Course</h4>

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
                          <th>Department Name</th>
                          <th>Course Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sno=1;
                          include("config.php");
                          $q = "select course.*,department.department_name from course inner join department on department.id=course.department";
                          $res = mysqli_query($conn,$q);
                          while($data = mysqli_fetch_array($res)){
                        ?>
                          <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data["department_name"]; ?></td>
                            <td><?php echo $data["course_name"]; ?></td>
                            <td>
                              <a href="update_course.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-edit text-success"></i>
                              </a>
                            </td>
                            <td>
                              <a href="delete_course.php?id=<?php echo $data['id']; ?>">
                                <i class="fa fa-trash text-danger"></i>
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