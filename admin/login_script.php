<?php
require_once "dbconnection.php";
if(isset($_SESSION['admin_id'])){
header('location:index.php');
exit();
}
$email=$_POST['email'];
$password=$_POST['password'];
// $password=md5(md5($password));
$sql="SELECT id FROM admin WHERE email='$email' AND password='$password'";
if($result = $conn->query($sql)){
    if($result->num_rows == 1){
        $row=$result->fetch_assoc();
        $_SESSION['admin_id']=$row['id'];
        header('location:dashboard.php');
        exit();
    } else {
        header('location:./index.php?error=Wrong email or password');
        exit();
    }
    
}
?>