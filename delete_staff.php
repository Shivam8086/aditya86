<?php
$id = $_REQUEST["id"];
include("config.php");
$qry = "delete from staff where id='$id'";
$res=mysqli_query($conn,$qry);
if($res>0)
  {
    echo "<script>window.location.assign('manage_staff.php?msg=Record Delete')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_staff.php?msg=Try Again')</script>";
  }
?>