<?php
include('./config.php');
if (isset($_POST['submit'])) {
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    if (!$token || $token !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit;
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = sha1(mysqli_real_escape_string($conn, $_POST['pass']));

        $get_user = mysqli_query($conn, "SELECT * FROM `user_account` WHERE `user_name`='$username' AND `password`='$password' AND `con_password`='$password'");

        if(!empty($_POST["remember"])) {
            setcookie ("username",$_POST["username"],time()+ 3600*30*24);
            setcookie ("password",$_POST["password"],time()+ 3600*30*24);
        
        } else {
            setcookie("username","");
            setcookie("password","");
            
        }
        
        

        $row = mysqli_fetch_assoc($get_user);
        if ($row['status'] == 1) {
            if (mysqli_num_rows($get_user) > 0) {
                $_SESSION['user_key'] = $row['user_key'];
                unset($_SESSION['success_msg']);
                unset($_SESSION['name']);
                header('location:./index');
            } else {
?>
                <script>
                    alert('Username or Password not match.');
                    window.location.href = './login';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Dear User Your Account Not Verify.\nPlease Verify Account First.');
                window.location.href = './login';
            </script>
<?php
        }
    }
}
?>