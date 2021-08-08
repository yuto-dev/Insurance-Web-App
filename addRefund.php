<?php
    session_start();

    $con = mysqli_connect("localhost","root","","insurance");

    $name = $_POST['name'];
    $plan = $_POST['plan'];

    $query = "INSERT INTO refund (cus_name,refund,plans) VALUES ('$name','Pending','$plan')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: cusMain.php");
        mysqli_close($con);
    }
    else
    {
        echo '<script>alert("Fail to insert!");</script>';
        header("Location: cusMain.php");
        mysqli_close($con);
    }
?>