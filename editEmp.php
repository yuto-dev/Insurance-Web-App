<?php
    session_start();

    $con = mysqli_connect("localhost","root","","insurance");

    $query = "UPDATE employee_records SET NAME = '$_POST[name]' WHERE login_ID = '$_SESSION[sessionID]'";
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