<?php
session_start();

$email = $_POST['exampleInputEmail'];
$password = $_POST['exampleInputPassword'];

// Database connection 
$con = new mysqli("localhost","root","","insurance");
if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
} else {
        $stmt = $con->prepare("select * from customer_login where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows == 1){
            $data = $stmt_result->fetch_assoc();
            $_SESSION['sessionID'] = $data["id"];

            if($data['password'] === $password){
                header('Location: cusMain.php');
            } else {
                echo '<script>alert("Invalid Credentials!");
                window.location.href="cusLogin.html";</script>';
            }
        } else {
            echo '<script>alert("Invalid Credentials!");
            window.location.href="cusLogin.html";</script>';
        }
    }
?>