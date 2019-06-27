<?php
require_once "dbconnection.php";

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql = "SELECT banned FROM user WHERE user_id={$user_id}";
    $result = $conn->query($sql)->fetch_assoc()['banned'];
    if($result == ''){
        $sql = "UPDATE user SET banned=CURRENT_TIMESTAMP() WHERE user_id={$user_id};";
        if($conn->query($sql)){
            echo '
            <i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i>
            ';
        }
    } else {
        $sql = "UPDATE user SET banned=NULL WHERE user_id={$user_id};";
        if($conn->query($sql)){
            echo '
            <i style="color:green;" class="fa fa-check-circle" aria-hidden="true"></i>
            ';
        }
    }
}
?>