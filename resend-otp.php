<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: Resend OTP ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body>
    <div class="container login w-25">
        <div class="card">
            <div class="card-header">
                <h2 class="text-secondary text-center">Resend OTP</h2>
                <p class='text-primary text-center'>Resend Verification OTP By Mail.</p>
            </div>
            <div class="card-body">
                <form action="./resend-otp-code" method="post">
                    <div class="form-group">
                        <label for=""><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="username" id="username" placeholder="Email" class="form-control" minlength="5">
                    </div>

                    <div class="btn w-100">
                        <button type="submit" name="submit" class="btn btn-outline-info w-100">Resend OTP</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
            <div class="btn-group d-flex ml-4">
                <a href="./register" class="btn btn-primary btn-sm">Register</a>
                 <a href="./forgot-pass" class="btn btn-success btn-sm">Forgot Password</a>
                 <a href="./login" class="btn btn-secondary btn-sm">Login Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="./assets/Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>