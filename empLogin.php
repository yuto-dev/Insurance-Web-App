<?php
session_start();


$email = $_POST['exampleInputEmail'];
$password = $_POST['exampleInputPassword'];

// Database connection 
$con = new mysqli("localhost","root","","insurance");
if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
} else {
        $stmt = $con->prepare("select * from login where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows == 1){
            $data = $stmt_result->fetch_assoc();
            $_SESSION['sessionID'] = $data["id"];

            if($data['password'] === $password){
                echo "<h2>Login Successfeully</h2>";
                header('Location: empMain.php');
            } else {
                echo '<script>alert("Invalid Credentials!");
                window.location.href="empLogin.html";</script>';
            }
        } else {
            echo '<script>alert("Invalid Credentials!");
            window.location.href="empLogin.html";</script>';
        }
    }
?>