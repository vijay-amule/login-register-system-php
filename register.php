<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: Register ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">


</head>

<body>
    <div class="container register w-25">
        <div class="card">
            <div class="card-header">
                <h2 class="text-secondary text-center">Register</h2>
                    <p class='text-primary text-center'>Please Register Your Account.</p>
            </div>
            <div class="card-body">
                <form action="register-code" method="post">
                    <div class="form-group">
                        <label for=""><i class="fa fa-user-plus" aria-hidden="true"></i> Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Full Name" class="form-control" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
                    </div>
                    <div class="form-group">
                        <label for=""><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="username" id="username" placeholder="Username" class="form-control" minlength="5" required>
                    </div>

                    <div class="form-group">
                        <label for=""><i class="fa fa-lock"></i> Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="form-control" minlength="8" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onmouseover="this.type='text'" onmouseout="this.type='password'">

                    </div>

                    <div class="form-group">
                        <label for=""><i class="fa fa-lock"></i> Confirm Password</label>
                        <input type="password" name="con_pass" id="con_pass" placeholder="Confirm Password" class="form-control" minlength="8" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onmouseover="this.type='text'" onmouseout="this.type='password'">

                    </div>

                    <div class="btn w-100">
                        <button type="submit" name="submit" class="btn btn-outline-info w-100">Register</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
            <div class="btn-group d-flex ml-4">
                <a href="./register" class="btn btn-primary btn-sm">Register</a>
                 <a href="./resend-otp" class="btn btn-secondary btn-sm">Resend OTP</a>
                 <a href="./login" class="btn btn-success btn-sm">Login Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="./assets/Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>