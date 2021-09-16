<?php
require('./config.php');
if(isset($_SESSION['user_key'])){
    unset($_SESSION['user_key']);
    header('location:./login');
}
?>