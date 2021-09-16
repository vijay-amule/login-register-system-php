<?php
require('./config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$subject = 'Email Verification Mail.';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $con_pass = mysqli_real_escape_string($conn, $_POST['con_pass']);

    if ($pass === $con_pass) {
        $check_user = mysqli_query($conn, "SELECT `user_name` FROM `user_account` WHERE `user_name` = '$username'");
        if (mysqli_num_rows($check_user) > 0) {
?>
            <script>
                alert('Dear User Your Email Already Exiest. Please Login.');
                window.location.href = './login';
            </script>
            <?php
        } else {
            $user_key = rand(0000000000, 9999999999);
            $otp = rand(000000, 999999);

            $pass_enc = sha1($pass);
            $con_pass_enc = sha1($con_pass);

            $msg = "Dear <b>$name</b>,<br>";
            $msg .= "Your OTP is :- <b>$otp</b><br>";
            $msg .= "Please Verify Your Account.";

            $insert = "INSERT INTO `user_account`
            (`user_key`,`name`, `user_name`, `password`, `con_password`, `otp`)
             VALUES ('$user_key', '$name', '$username','$pass_enc','$con_pass_enc','$otp')";

            if (mysqli_query($conn, $insert)) {

                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'vijay.digitalonebox@gmail.com';                     //SMTP username
                    $mail->Password   = '9407005023';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS, PHPMailer::ENCRYPTION_SMTPS=465`

                    //Recipients
                    $mail->setFrom('vijayamule@teknikforce.com', $subject);
                    $mail->addAddress($username, $name);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $msg;

                    $mail->send();
                    $_SESSION['name'] = $name;
                    header('location:./email-verification?u_id=' . $user_key);
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                //header('location:./login');
            } else {
            ?>
                <script>
                    alert('Dear User Registretion Faild.');
                    window.location.href = './register';
                </script>
        <?php
            }
        }
    } else {
        ?>
        <script>
            alert('Dear User Password and Confirm Password not match.');
            window.location.href = './register';
        </script>
<?php
    }
}
