<?php
include("header.php");
include("config.php");
$updateq = "SELECT * FROM `student` WHERE `id`='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres)){}
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Student</h4>

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
                                  if($updatedata["course"] == $data["id"])
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
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="name" value="<?php echo $updatedata['name']; ?>"/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="email" class="form-control" id="basic-default-fullname" name="email" value="<?php echo $updatedata['email']; ?>"/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Roll Number</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="rollno" value="<?php echo $updatedata['rollno']; ?>"/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Contact</label>
                          <input type="number" class="form-control" id="basic-default-fullname" name="contact" value="<?php echo $updatedata['contact']; ?>"/>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Father Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="father_name" value="<?php echo $updatedata['father_name']; ?>"/>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <textarea class="form-control" id="basic-default-fullname" name="address"><?php echo $updatedata['address']; ?></textarea>
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
  $name = $_REQUEST["name"];
  $course_name = $_REQUEST["course_name"];
  $email = $_REQUEST["email"];
  $id = $_REQUEST["id"];
  $contact = $_REQUEST["contact"];
  $address = $_REQUEST["address"];
  $rollno = $_REQUEST["rollno"];
  $father_name = $_REQUEST["father_name"];
 
  include("config.php");
  $query = "UPDATE `student` SET `course`='$course_name',`name`='$name',`email`='$email',`rollno`='$rollno',`contact`='$contact',`address`='$address',`father_name`='$father_name' WHERE `id`='$id'";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('manage_student.php?msg=Record Updated')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_student.php?msg=Try Again')</script>";
  }
}
?>