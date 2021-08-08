<?php
    session_start();

    $con = mysqli_connect("localhost","root","","insurance");

    $detail = $_POST['detail'];
    $location = $_POST['location'];
    $time = $_POST['time'];
    $damage = $_POST["damage"];
    $name = $_POST["name"];

    $query = "INSERT INTO claim (details,location,time,damage,cus_name) VALUES ('$detail','$location','$time','$damage','$name')";
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