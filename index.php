<?php
require('./config.php');
if (!isset($_SESSION['user_key'])) {
    header('location:./login');
} else {
    $user_key = $_SESSION['user_key'];
    $get_user_data = mysqli_query($conn, "SELECT * FROM user_account WHERE user_key = '$user_key'");
    $data = mysqli_fetch_assoc($get_user_data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..:: User Dashboard ::..</title>
    <link rel="stylesheet" href="./assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/Fonts/cabin.ttf">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

</head>

<body>

    <div class="container w-50 mt-5">
    <h3 class="text-center text-primary float-left">Welcome <?php echo $data['name']; ?></h3>
        <a href="./logout" class="btn btn-danger float-right"><i class="fa fa-minus-circle"></i> Logout</a>
    </div>

    <script src="./assets/jQuery/jquery-3.6.0.slim.min.js"></script>
    <script src="./assets/Bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
