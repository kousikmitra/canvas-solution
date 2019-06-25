<?php
require 'includes/common.php';
if(!isset($_SESSION['user_id'])){
header('location:index.php');
exit();
}
if (isset($_POST['report_question'])) {
    $user_id=$_SESSION['user_id'];
    $question_id=$_POST['question_id'];
    $report_details=nl2br(str_replace("\\r\\n", "", mysqli_real_escape_string($con, $_POST['report_details'])));
    $user_qs_query="SELECT * FROM report_question WHERE question_id='$question_id' and user_id='$user_id'";
    $user_qs_result=mysqli_query($con, $user_qs_query) or die(mysqli_error($con));
    if (mysqli_num_rows($user_qs_result)!=0) {
        header('location:report.php?error='.$question_id.'&message='.'You Have Already Reported This Question');
        exit();
    } else {
        $result=mysqli_query($con, "INSERT into report_question(user_id,question_id,report_details) VALUES('$user_id','$question_id','$report_details')") or die(mysqli_error($con));
        header('location:answers.php?question_id='.$question_id);
        exit();
    }
}

if (isset($_POST['report_answer'])) {
    $user_id=$_SESSION['user_id'];
    $answer_id=$_POST['answer_id'];
    $question_id = $_POST['question_id'];
    $report_details=nl2br(str_replace("\\r\\n", "", mysqli_real_escape_string($con, $_POST['report_details'])));
    $user_qs_query="SELECT * FROM report_answer WHERE answer_id='$answer_id' and user_id='$user_id'";
    $user_qs_result=mysqli_query($con, $user_qs_query) or die(mysqli_error($con));
    if (mysqli_num_rows($user_qs_result)!=0) {
        header('location:report.php?error='.$question_id.'&message='.'You Have Already Reported This Answer');
        exit();
    } else {
        $result=mysqli_query($con, "INSERT into report_answer(user_id,answer_id,report_details) VALUES('$user_id','$answer_id','$report_details')") or die(mysqli_error($con));
        header('location:answers.php?question_id='.$question_id);
        exit();
    }
}
?>