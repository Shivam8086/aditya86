<?php
$id = $_REQUEST["id"];
include("config.php");
$qry = "delete from department where id='$id'";
$res=mysqli_query($conn,$qry);
if($res>0)
  {
    echo "<script>window.location.assign('manage_department.php?msg=Record Delete')</script>";
  }
  else{
    echo "<script>window.location.assign('manage_department.php?msg=Try Again')</script>";
  }
?>