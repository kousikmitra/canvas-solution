<?php
require_once "dbconnection.php";

if(isset($_GET['report_id'])){
    $report_id = $_GET['report_id'];
    $sql = "DELETE FROM report_answer WHERE id = {$report_id}";
    
    if($conn->query($sql)){
        echo "Report Cancelled";
    } else {
        echo "Error";
    }
}

if(isset($_GET['answer_id'])){
    $answer_id = $_GET['answer_id'];
    $sql = "DELETE FROM answer WHERE answer_id = {$answer_id}";
    
    if($conn->query($sql)){
        echo "Answer Deleted";
    } else {
        echo "Error!".$conn->error;
    }
}
?>