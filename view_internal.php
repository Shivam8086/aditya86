<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Internal Accessment</h4>

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
                    <table class="table table-striped mt-3">
                      <thead>
                        <tr class="table-primary">
                          <th>#</th>
                          <th>Student</th>
                          <th>Course</th>
                          <th>MST-1</th>
                          <th>MST-2</th>
                          <th>Assignment-1</th>
                          <th>Assignment-2</th>
                          <th>Monthly Attendance</th>
                          <th>Class Performance</th>
                        </tr>
                      </thead>
                      <form method="post">
                        <tbody>
                          <?php
                            $sno=1;
                            include("config.php");
                            $q = "SELECT `marks`.*,`course`.`course_name` FROM `marks`INNER JOIN `course` ON `course`.`id`=`marks`.`course` WHERE `marks`.`course`='$_SESSION[student_course]'";
                            $res = mysqli_query($conn,$q);
                            $totalrows = mysqli_num_rows($res);
                            while($data = mysqli_fetch_array($res)){
                          ?>
                            <tr>
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $data["student"]; ?></td>
                              <td><?php echo $data["course_name"]; ?></td>
                              <td><?php echo $data["mst_1"]; ?></td>
                              <td><?php echo $data["mst_2"]; ?></td>
                              <td><?php echo $data["assignment_1"]; ?></td>
                              <td><?php echo $data["assignment_2"]; ?></td>
                              <td><?php echo $data["monthly_attandance"]; ?></td>
                              <td><?php echo $data["class_performance"]; ?></td>
                            </tr>
                          <?php
                            $sno++;
                            }
                          ?>
                        </tbody>
                        
                      </form>
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

<?php
if(isset($_REQUEST["submit"]))
{
  $student = $_REQUEST["student"];
  $course = $_REQUEST["course"];
  $total_count = $_REQUEST["total_count"];
  $mst1 = $_REQUEST["mst1"];
  $mst2 = $_REQUEST["mst2"];
  $assignment1 = $_REQUEST["assignment1"];
  $assignment2 = $_REQUEST["assignment2"];
  $monthlyattendance = $_REQUEST["monthlyattendance"];
  $classperformance = $_REQUEST["classperformance"];

 
  include("config.php");
  for($i=0;$i<$total_count;$i++)
  {
    $query = "INSERT INTO `marks`(`course`, `student`, `mst_1`, `mst_2`, `assignment_1`, `assignment_2`, `monthly_attandance`, `class_performance`) VALUES ('$course[$i]','$student[$i]','$mst1[$i]','$mst2[$i]','$assignment1[$i]','$assignment2[$i]','$monthlyattendance[$i]','$classperformance[$i]')";
    $res = mysqli_query($conn,$query);
  }
  if($res>0)
  {
    echo "<script>window.location.assign('add_marks.php?msg=Marks Added')</script>";
  }
  else{
    echo "<script>window.location.assign('add_marks.php?msg=Try Again')</script>";
  }
}
?>