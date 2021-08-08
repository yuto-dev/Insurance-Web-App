<?php
$con = mysqli_connect("localhost","root","","insurance");

if(isset($_POST['date']))
{
    $plan = $_POST['plan'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $detail = $_POST['detail'];

    $query = "INSERT INTO addplan (plan,date,detail) VALUES ('$plan','$date','$detail')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: empMain.php");

        mysqli_close($con);
    }
    else
    {
        echo '<script>alert("Fail to insert!");</script>';
        header("Location: empMain.php");
    }
}
?>