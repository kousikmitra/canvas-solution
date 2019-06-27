<?php
require_once "dbconnection.php";

if(isset($_GET['report_id'])){
    $report_id = $_GET['report_id'];
    $sql = "DELETE FROM report_question WHERE id = {$report_id}";
    
    if($conn->query($sql)){
        echo "Report Cancelled";
    } else {
        echo "Error";
    }
}

if(isset($_GET['question_id'])){
    $question_id = $_GET['question_id'];
    $conn->query("DELETE FROM answer WHERE question_id = {$question_id};");
    $sql = "DELETE FROM question WHERE question_id = {$question_id}";
    
    if($conn->query($sql)){
        echo "Question Deleted";
    } else {
        echo "Error!".$conn->error;
    }
}
?>