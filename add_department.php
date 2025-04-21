<?php
include("header.php");
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Add Department</h4>

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
                        <input type="text" class="form-select" id="basic-default-fullname" name="department_name" />
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
 
  include("config.php");
  $query = "INSERT INTO `department`(`department_name`) VALUES ('$department_name')";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('add_department.php?msg=Record Inserted')</script>";
  }
  else{
    echo "<script>window.location.assign('add_department.php?msg=Try Again')</script>";
  }
}
?>