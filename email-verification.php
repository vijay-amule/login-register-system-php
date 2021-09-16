<?php
include('./config.php');
$error_msg = '';
if (isset($_GET['u_id'])) {
    $user_key = $_GET['u_id'];
    $name = $_SESSION['name'];
    $otp = rand(000000, 999999);

    if (isset($_POST['submit'])) {
        $input_otp = mysqli_real_escape_string($conn, $_POST['otp']);

        $check_user = mysqli_query($conn, "SELECT * FROM `user_account` WHERE `user_key` = '$user_key'");
        if (mysqli_num_rows($check_user) > 0) {
            $row = mysqli_fetch_assoc($check_user);
            $send_otp = $row['otp'];
            if (!empty($input_otp) && $input_otp === $send_otp) {
                $update_status = mysqli_query($conn, "UPDATE `user_account` SET `otp`='$otp',`status`= 1 WHERE `user_key`='$user_key'");
                $_SESSION['success_msg'] = "Dear $name, Your Account Successfully Verified.";
                header('location:./login');
            } else {
                $error_msg = "Wrong OTP. Please try again.";
            }
        }
    }
} else {
    header('location:./register');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: Email Verification ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body>
    <div class="container login w-25">
        <div class="card">
            <div class="card-header">
                <h2 class="text-secondary text-center">Email Verification</h2>
                <p class='text-primary text-center'>Dear <?php echo $name; ?> Please check your mail and verify your account.</p>
                <p class='text-danger text-center'><?php echo $error_msg; ?></p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for=""><i class="fa fa-user"></i> OTP</label>
                        <input type="number" name="otp" id="otp" placeholder="6 Digit OTP" class="form-control" minlength="5">
                    </div>

                    <div class="btn w-100">
                        <button type="submit" name="submit" class="btn btn-outline-info w-100">Verify</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="btn-group d-flex ml-4">
                    <a href="./register" class="btn btn-primary btn-sm">Register</a>
                    <a href="./login" class="btn btn-success btn-sm">Login Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="./assets/Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>