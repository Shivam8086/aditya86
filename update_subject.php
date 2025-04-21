<?php
include("header.php");
include("config.php");
$updateq = "select * from subject where id='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres)){}
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Subject</h4>

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
                          <label class="form-label" for="basic-default-fullname">Semester</label>
                          <select class="form-control" id="basic-default-fullname" name="semester">
                            <option value="" selected disabled>Select Semester</option>
                            <?php 
                              if($updatedata["semester"] == 1)
                              {
                            ?>
                              <option selected>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 2)
                              {
                            ?>
                              <option>1</option>
                              <option selected>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 3)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option selected>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 4)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option selected>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 5)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option selected>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 6)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option selected>6</option>
                              <option>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 7)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option selected>7</option>
                              <option>8</option>
                            <?php 
                              }
                              else if($updatedata["semester"] == 8)
                              {
                            ?>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option selected>8</option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Subject Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="subject_name" value="<?php echo $updatedata['subject']; ?>" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Subject Code</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="subject_code" value="<?php echo $updatedata['subject_code']; ?>"/>
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
  $semester = $_REQUEST["semester"];
  $course_name = $_REQUEST["course_name"];
  $subject_name = $_REQUEST["subject_name"];
  $subject_code = $_REQUEST["subject_code"];
 
  include("config.php");
  $query = "UPDATE `subject` SET `course`='$course_name',`subject`='$subject_name',`semester`='$semester',`subject_code`='$subject_code' WHERE `id`='$id'";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('manage_subject.php?msg=Record Updated')</script>";
  }
  else{
    // echo mysqli_error($conn);
    echo "<script>window.location.assign('manage_subject.php?msg=Try Again')</script>";
  }
}
?>