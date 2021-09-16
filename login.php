<?php
include('./config.php');
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
$_SESSION['error_msg'] = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: Login ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body>
    <div class="container login w-25">
        <div class="card">
            <div class="card-header">
                <h2 class="text-secondary text-center">Login</h2>
                <?php
                if (!empty($_SESSION['success_msg'])) {
                    echo "<p class='text-success text-center'>" . $_SESSION['success_msg'] . "</p>";
                } else {
                    echo "<p class='text-primary text-center'>Please Login Your Account.</p>";
                }
                ?>
            </div>
            <div class="card-body">
                <form action="./login-code" method="post">
                    <div class="form-group">
                        <label for=""><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="username" id="username" placeholder="Email" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" class="form-control" minlength="5" required>
                    </div>

                    <div class="form-group">
                        <label for=""><i class="fa fa-lock"></i> Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="form-control" minlength="8" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onmouseover="this.type='text'" onmouseout="this.type='password'" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">

                    </div>

                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                    <input type="checkbox" name="remember" /> Remember me

                    <div class="btn w-100">
                        <button type="submit" name="submit" class="btn btn-outline-info w-100">Login</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="btn-group d-flex ml-3">
                <a href="./register" class="btn btn-primary btn-sm">Register</a>
                 <a href="./resend-otp" class="btn btn-secondary btn-sm">Resend OTP</a>
                 <a href="./forgot-pass" class="btn btn-success btn-sm">Forgot Password</a>
                </div>
                
            </div>
        </div>
    </div>

    <script src="./assets/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="./assets/Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>