<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Course</h4>

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
                    <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Department Name</label>
                        <select class="form-select" id="basic-default-fullname" name="department_name">
                          <option value="" selected disabled>Select Department</option>
                          <?php
                            $sno=1;
                            include("config.php");
                            $q = "select * from department";
                            $res = mysqli_query($conn,$q);
                            while($data = mysqli_fetch_array($res)){
                          ?>
                          <option value="<?php echo $data['id']; ?>"><?php echo $data["department_name"]; ?></option>
                          <?php 
                            }
                          ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Course Name</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="course_name" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
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
  $department_name = $_REQUEST["department_name"];
  $course_name = $_REQUEST["course_name"];
 
  include("config.php");
  $query = "INSERT INTO `course`(`department`, `course_name`) VALUES ('$department_name','$course_name')";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('add_course.php?msg=Record Inserted Sucessful')</script>";
  }
  else{
    echo "<script>window.location.assign('add_course.php?msg=Try Again')</script>";
  }
}
?>