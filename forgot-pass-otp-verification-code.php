<?php
include('./config.php');
$error_msg = '';
$user_key = $_GET['u_id'];
if (isset($_GET['u_id'])) {
    $user_key = $_GET['u_id'];
    $name = $_SESSION['name'];

    if (isset($_POST['submit'])) {
        $input_otp = mysqli_real_escape_string($conn, $_POST['otp']);

        $check_user = mysqli_query($conn, "SELECT * FROM `user_account` WHERE `user_key` = '$user_key'");
        if (mysqli_num_rows($check_user) > 0) {
            $row = mysqli_fetch_assoc($check_user);
            $send_otp = $row['otp'];
            if (!empty($input_otp) && $input_otp === $send_otp) {
                $_SESSION['success_msg'] = "Dear $name, Set New Password.";
                header('location:./set-password?u_id='.$user_key);
            }else{
                ?>
                <script>
                    alert('Wrong OTP');
                    window.location.href = './forgot-pass-otp-verification?u_id=<?php echo $user_key; ?>';
                </script>
                <?php
            }
        }
    }
} else {
    header('location:./register');
}
?>
