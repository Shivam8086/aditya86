<?php
$conn = mysqli_connect("localhost","root","","internal_management_system");
if(!$conn)
{
    echo mysqli_error($conn);
}
?>