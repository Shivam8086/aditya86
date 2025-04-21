<?php
include("header.php");
include("config.php");
$updateq = "SELECT * FROM `assign_class` where id='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres)){}
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Assign Class</h4>

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
                      <input type="hidden" name="id" value="<?php echo $updatedata['id']; ?>">
                      <div class="row mb-3">
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Course Name</label>
                            <select class="form-control" id="basic-default-fullname" name="course_name">
                              <option value="" selected disabled>Select Course</option>
                              <?php
                                $sno=1;
                                include("config.php");
                                $q = "select * from course";
                                $res = mysqli_query($conn,$q);
                                while($data = mysqli_fetch_array($res)){
                                  if($updatedata["course"]==$data["id"])
                                  {
                              ?>
                                <option value="<?php echo $data['id']; ?>" selected><?php echo $data["course_name"]; ?></option>
                              <?php 
                                  }
                                  else{
                              ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data["course_name"]; ?></option>
                              <?php
                                  }
                                }
                              ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Staff</label>
                            <select class="form-control" id="basic-default-fullname" name="staff">
                              <option value="" selected disabled>Select Teacher</option>
                              <?php
                                $sno=1;
                                include("config.php");
                                $q1 = "select * from staff";
                                $res1 = mysqli_query($conn,$q1);
                                while($data1 = mysqli_fetch_array($res1)){
                                  if($updatedata["staff"]==$data1["id"])
                                  {
                              ?>
                                <option value="<?php echo $data1['id']; ?>" selected><?php echo $data1["name"]." - ".$data1["email"]; ?></option>
                              <?php 
                                  }
                                  else{
                              ?>
                               <option value="<?php echo $data1['id']; ?>"><?php echo $data1["name"]." - ".$data1["email"]; ?></option>
                              <?php
                                  }
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
  $id = $_REQUEST["id"];
  $staff = $_REQUEST["staff"];
  $course_name = $_REQUEST["course_name"];
  
  include("config.php");
  $query = "UPDATE `assign_class` SET `course`='$course_name',`staff`='$staff' WHERE `id`='$id'";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('manage_assign_class.php?msg=Record Inserted')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_assign_class.php?msg=Try Again')</script>";
  }
}
?>