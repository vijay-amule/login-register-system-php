<?php
    date_default_timezone_set('Asia/Kolkata');
    $conn = mysqli_connect('localhost','root','');
    if($conn == true){
        session_start();
        mysqli_select_db($conn,'teknikforce');
    }else{
        mysqli_close($conn);
        die('Server Connection error');
    }

?>