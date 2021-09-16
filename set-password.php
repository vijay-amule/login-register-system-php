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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: Set Password ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <div class="container register w-25">
        <div class="card">
            <div class="card-header">
                <h2 class="text-secondary text-center">Set New Password</h2>
                    <p class='text-primary text-center'><?php echo $_SESSION['success_msg']; ?></p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for=""><i class="fa fa-lock"></i> Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="form-control" minlength="8" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onmouseover="this.type='text'" onmouseout="this.type='password'">

                    </div>

                    <div class="form-group">
                        <label for=""><i class="fa fa-lock"></i> Confirm Password</label>
                        <input type="password" name="con_pass" id="con_pass" placeholder="Confirm Password" class="form-control" minlength="8" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onmouseover="this.type='text'" onmouseout="this.type='password'">

                    </div>

                    <div class="btn w-100">
                        <button type="submit" name="submit" class="btn btn-outline-info w-100">Set New Password</button>
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