<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
$user_id=$_SESSION['user_id'];
$question_id=$_POST['question_id'];
$answer=nl2br(str_replace("\\r\\n","
", mysqli_real_escape_string($con, $_POST['answer'] )));
$user_qs_query="SELECT * FROM answer WHERE question_id='$question_id' and user_id='$user_id'";
$user_qs_result=mysqli_query($con,$user_qs_query) or die(mysqli_error($con));
if(mysqli_num_rows($user_qs_result)!=0){
    header('location:answers.php?question_id='.$question_id.'&message='.'You Have Already Answered This Question');
    exit();
}
else{
    $result=mysqli_query($con,"INSERT into answer(question_id,user_id,answer) VALUES('$question_id','$user_id','$answer')") or die(mysqli_error($con));
    header('location:answers.php?question_id='.$question_id);
    exit();
}
?>