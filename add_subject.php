<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Subject</h4>

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
                      <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Course Name</label>
                            <select class="form-select" id="basic-default-fullname" name="course_name">
                              <option value="" selected disabled>Select Course</option>
                              <?php
                                $sno=1;
                                include("config.php");
                                $q = "select * from course";
                                $res = mysqli_query($conn,$q);
                                while($data = mysqli_fetch_array($res)){
                              ?>
                              <option value="<?php echo $data['id']; ?>"><?php echo $data["course_name"]; ?></option>
                              <?php 
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Semester</label>
                          <select class="form-select" id="basic-default-fullname" name="semester">
                            <option value="" selected disabled>Select Semester</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Subject Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="subject_name" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Subject Code</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="subject_code" />
                        </div>
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
  $semester = $_REQUEST["semester"];
  $course_name = $_REQUEST["course_name"];
  $subject_name = $_REQUEST["subject_name"];
  $subject_code = $_REQUEST["subject_code"];
 
  include("config.php");
  $query = "INSERT INTO `subject`(`course`, `subject`, `semester`, `subject_code`) VALUES ('$course_name','$subject_name','$semester','$subject_code')";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('add_subject.php?msg=Record Inserted')</script>";
  }
  else{
    echo "<script>window.location.assign('add_subject.php?msg=Try Again')</script>";
  }
}
?>