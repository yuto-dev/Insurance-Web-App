<?php
$con = mysqli_connect("localhost","root","","insurance");

if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirmpassword'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $contact = $_POST['contact'];
    $income = $_POST['income'];

    if ($password=$confirm){
        $addlogin = "INSERT INTO customer_login (email,password) VALUES ('$email','$password')";

        $query_run = mysqli_query($con,$addlogin);

        if($query_run){
            $addcustomer = "INSERT INTO customer_records (NAME,AGE,GENDER,NATIONALITY,PHONE_NUMBER,INCOME,PLAN_CHOICE)
             VALUES ('$name','$age','$gender','$nationality','$contact','$income','none') ";

            $query_run = mysqli_query($con,$addcustomer);
            
            if($query_run){
                header("Location:empMain.html");
            }else{
                echo '<script>alert("Fail to insert personal details")';
            }
        }
    } else {
        echo '<script>alert("Password and Confirm Password Does Not Match!");</script>';
    }


    mysqli_close($con);
}
?>
