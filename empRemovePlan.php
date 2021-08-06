<?php
$con = mysqli_connect("localhost","root","","insurance");

$query = "DELETE FROM addplan WHERE id = '$_GET[id]'";
$query_run = mysqli_query($con,$query);

if($query_run){
    header("Location: empMain.html");
    mysqli_close($con);
} else {
    echo '<script>alert("Fail to Delete Plan!)';
    header("Location:empManagePlan.php");
}


?>