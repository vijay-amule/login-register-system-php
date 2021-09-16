<?php
include('./config.php');
$error_msg = '';
$user_key = $_GET['u_id'];
if (isset($_GET['u_id'])) {
    $user_key = $_GET['u_id'];
    $name = $_SESSION['name'];

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
                <h2 class="text-secondary text-center">Forgot Password OTP Verification</h2>
                <p class='text-primary text-center'>Dear <?php echo $name; ?> Please check your mail and fill OTP.</p>
            </div>
            <div class="card-body">
                <form action="forgot-pass-otp-verification-code?u_id=<?php echo $user_key; ?>" method="post">
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