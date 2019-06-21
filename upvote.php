<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
$user_id=$_GET['user_id'];
$answer_id=$_GET['answer_id'];
$question_id=$_GET['question_id'];
$q=mysqli_query($con,"SELECT * FROM upvote WHERE answer_id='$answer_id' and  user_id='$user_id'") or die(mysqli_error($con));
$q=mysqli_num_rows($q);
if($q==1){
    header('location:answers.php?question_id='.$question_id);
    exit();
}
$result=mysqli_query($con,"INSERT into upvote(user_id,answer_id) VALUES('$user_id','$answer_id')") or die(mysqli_error($con));
$q=mysqli_query($con,"SELECT * FROM answer WHERE answer_id='$answer_id'") or die(mysqli_error($con));
$q=mysqli_fetch_array($q);
$q=$q['upvote'];
$upvote=$q+1;
$result=mysqli_query($con,"UPDATE answer SET upvote='$upvote' WHERE answer_id='$answer_id'") or die(mysqli_error($con));
header('location:answers.php?question_id='.$question_id);
exit();
?>