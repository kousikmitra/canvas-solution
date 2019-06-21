<?php
require 'includes/common.php';
if(isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password=md5(md5($password));
$user_login_query="SELECT user_id FROM user WHERE email='$email' AND password='$password'";
$user_login_result=mysqli_query($con,$user_login_query) or die(mysqli_error($con));
if(mysqli_num_rows($user_login_result)==0){
    header('location:login.php?login_error=Wrong email or password,Check and re-enter your email and password');
    exit();
}
else{
    $row=mysqli_fetch_array($user_login_result);
    $_SESSION['user_id']=$row['user_id'];
    header('location:index.php');
    exit();
}
?>