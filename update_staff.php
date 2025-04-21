<?php
include("header.php");
include("config.php");
$updateq = "SELECT * FROM `staff` where id='$_GET[id]'";
$updateres = mysqli_query($conn,$updateq);
if($updatedata = mysqli_fetch_array($updateres)){}
?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Update Staff</h4>

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
                      <input type="hidden" name="id" value="<?php echo $updatedata['id']; ?>" />
                      <div class="row mb-3">
                      
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" name="name" value="<?php echo $updatedata['name']; ?>" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="basic-default-fullname">Contact</label>
                          <input type="number" class="form-control" id="basic-default-fullname" name="contact" value="<?php echo $updatedata['contact']; ?>" />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="email" class="form-control" id="basic-default-fullname" name="email" value="<?php echo $updatedata['email']; ?>"/>
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
  $contact = $_REQUEST["contact"];
  $email = $_REQUEST["email"];
  $id = $_REQUEST["id"];
  $address = $_REQUEST["address"];
 
  include("config.php");
  $query = "UPDATE `staff` SET `name`='$name',`email`='$email',`contact`='$contact',`address`='$address' WHERE `id`='$id'";
  $res = mysqli_query($conn,$query);

  if($res>0)
  {
    echo "<script>window.location.assign('manage_staff.php?msg=Record Updated')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_staff.php?msg=Try Again')</script>";
  }
}
?>