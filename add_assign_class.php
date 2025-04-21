<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Assign Class</h4>

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
                            <label class="form-label" for="basic-default-fullname">Staff</label>
                            <select class="form-select" id="basic-default-fullname" name="staff">
                              <option value="" selected disabled>Select Teacher</option>
                              <?php
                                $sno=1;
                                include("config.php");
                                $q1 = "select * from staff";
                                $res1 = mysqli_query($conn,$q1);
                                while($data1 = mysqli_fetch_array($res1)){
                              ?>
                              <option value="<?php echo $data1['id']; ?>"><?php echo $data1["name"]." - ".$data1["email"]; ?></option>
                              <?php 
                                }
                              ?>
                            </select>
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
  $staff = $_REQUEST["staff"];
  $course_name = $_REQUEST["course_name"];
  
  include("config.php");
  $query = "INSERT INTO `assign_class`(`course`, `staff`) VALUES ('$course_name','$staff')";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('add_assign_class.php?msg=Record Inserted')</script>";
  }
  else{
    echo "<script>window.location.assign('add_assign_class.php?msg=Try Again')</script>";
  }
}
?>