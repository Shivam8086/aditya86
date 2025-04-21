<?php
include("header.php");
include("config.php");
$updateq = "select * from department where id='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres))
{}
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Department</h4>

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
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Department Name</label>
                        <input type="text" class="form-control" id="basic-default-fullname" name="department_name" value="<?php echo $updatedata['department_name']; ?>"/>
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
  $department_name = $_REQUEST["department_name"];
 
  include("config.php");
  $query = "UPDATE `department`set `department_name`='$department_name' WHERE id='$id'";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('manage_department.php?msg=Record Inserted')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_department.php?msg=Try Again')</script>";
  }
}
?>