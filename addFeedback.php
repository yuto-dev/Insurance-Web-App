<?php
    session_start();

    $con = mysqli_connect("localhost","root","","insurance");

    $feedback = $_POST['feedback'];

    $query = "INSERT INTO feedback (customer_id,feedback) VALUES ('$_SESSION[sessionID]','$feedback')";
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