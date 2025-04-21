<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Students</h4>

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
                          <th>Name</th>
                          <th>Course</th>
                          <th>Father Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sno=1;
                          include("config.php");
                          $q = "SELECT `student`.*,`course`.`course_name` FROM `student` inner join `course` on `course`.`id`=`student`.`course` where `student`.`course`='$_REQUEST[courseid]'";
                          $res = mysqli_query($conn,$q);
                          while($data = mysqli_fetch_array($res)){
                        ?>
                          <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data["name"]; ?></td>
                            <td><?php echo $data["course_name"]; ?></td>
                            <td><?php echo $data["father_name"]; ?></td>
                            <td><?php echo $data["email"]; ?></td>
                            <td><?php echo $data["contact"]; ?></td>
                            <td><?php echo $data["address"]; ?></td>
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