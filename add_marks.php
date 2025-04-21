<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Marks</h4>

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
                    <form>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Course Name</label>
                        <select class="form-select" id="basic-default-fullname" name="course">
                          <option value="" selected disabled>Select Course</option>
                          <?php
                            $sno=1;
                            include("config.php");
                            $q1 = "select * from course";
                            $res1 = mysqli_query($conn,$q1);
                            while($data1 = mysqli_fetch_array($res1)){
                          ?>
                          <option value="<?php echo $data1['id']; ?>"><?php echo $data1["course_name"]; ?></option>
                          <?php 
                            }
                          ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark mx-auto d-block col-md-4 mb-5">Search</button>
                    </form>
                    <?php
                    if(isset($_REQUEST["course"]))
                    {
                    ?>
                    <hr>
                    <table class="table table-striped mt-3">
                      <thead>
                        <tr class="table-primary">
                          <th>#</th>
                          <th>Name</th>
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
                            $q = "SELECT `student`.*,`course`.`course_name` FROM `student` inner join `course` on `course`.`id`=`student`.`course` where `student`.`course`='$_GET[course]'";
                            $res = mysqli_query($conn,$q);
                            $totalrows = mysqli_num_rows($res);
                            while($data = mysqli_fetch_array($res)){
                          ?>
                            <tr>
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $data["name"]; ?></td>
                              <td><?php echo $data["course_name"]; ?></td>
                              <td>
                                <input type="hidden" name="student[]" value="<?php echo $data['email']; ?>"/>
                                <input type="hidden" name="course[]" value="<?php echo $data['course']; ?>"/>
                                <input type="number" min="0" max="50" value="0" name="mst1[]"/>
                              </td>
                              <td>
                                <input type="number" min="0" max="50" value="0" name="mst2[]"/>
                              </td>
                              <td>
                                <input type="number" min="0" max="20" value="0" name="assignment1[]"/>
                              </td>
                              <td>
                                <input type="number" min="0" max="20" value="0" name="assignment2[]"/>
                              </td>
                              <td>
                                <input type="number" min="0" max="31" value="0" name="monthlyattendance[]"/>
                              </td>
                              <td>
                                <input type="number" min="0" max="10" value="0" name="classperformance[]"/>
                              </td>
                            </tr>
                          <?php
                            $sno++;
                            }
                          ?>
                        </tbody>
                        <tr>
                          <th colspan="9">
                            <input type="hidden" name="total_count" value="<?php echo $totalrows; ?>">
                            <button type="submit" name="submit" class="btn btn-dark col-md-12">Submit Marks</button>
                          </th>
                        </tr>
                      </form>
                    </table>
                    <?php
                    }
                    ?>
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