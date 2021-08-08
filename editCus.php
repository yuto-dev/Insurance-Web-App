<?php
    session_start();

    $con = mysqli_connect("localhost","root","","insurance");


    if ($_POST["password"] == $_POST["confirmpassword"]){
        $query = "UPDATE customer_login SET email = '$_POST[email]', password = '$_POST[password]' WHERE id = '$_SESSION[sessionID]'  ";

        $query_run = mysqli_query($con, $query);

        
        $query2 = "UPDATE customer_records SET NAME = '$_POST[name]', AGE = '$_POST[age]', GENDER = '$_POST[gender]',
          NATIONALITY = '$_POST[nationality]', PHONE_NUMBER = '$_POST[contact]', INCOME = '$_POST[income]' WHERE User_ID = '$_SESSION[sessionID]'";
        $query_run2 = mysqli_query($con, $query2);

        if($query_run2)
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
        
    }

   
?>