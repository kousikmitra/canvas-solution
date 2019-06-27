<?php
$conn = new mysqli("localhost","root","","quora");
if($conn->connect_error){
    die("Connection Failed! ".$conn->connect_error);
}
session_start();
?>