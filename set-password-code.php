<?php
include('./config.php');
$error_msg = '';
if (isset($_GET['u_id'])) {
    $user_key = $_GET['u_id'];
    $name = $_SESSION['name'];
    $otp = rand(000000, 999999);

    if(isset($_POST['submit'])){
        $pass = sha1(mysqli_real_escape_string($conn, $_POST['pass']));
        $con_pass = sha1(mysqli_real_escape_string($conn, $_POST['con_pass']));

         $update_status = mysqli_query($conn, "UPDATE `user_account`  SET `password`='$pass',`con_password`='$con_pass',`otp`='$otp' WHERE `user_key`='$user_key'");
         $_SESSION['success_msg'] = "Dear $name Your Password Successfully Reset. Please Login Account";
         header('location:./login');
    }
    
}else {
    header('location:./register');
}
?>
