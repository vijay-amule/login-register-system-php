<?php
require('./config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$subject = 'Email Verification Mail.';
if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $check_user = mysqli_query($conn, "SELECT * FROM `user_account` WHERE `user_name` = '$username'");
    if (mysqli_num_rows($check_user) > 0) {
        $row = mysqli_fetch_assoc($check_user);

        
            $name = $row['name'];
            $user_key = $row['user_key'];
            $otp = rand(000000, 999999);
            $update_status = mysqli_query($conn, "UPDATE `user_account` SET `otp`='$otp' WHERE `user_name` = '$username'");

            $subject = 'Forgot Password OTP.';
            $msg = "Dear <b>$name</b>,<br>";
            $msg .= "Your OTP is :- <b>$otp</b><br>";
            $msg .= "Please Verify Your Account.";

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
                header('location:./forgot-pass-otp-verification?u_id='.$user_key);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
    }else {
        ?>
        <script>
            alert('Your Account Not Available. Please Register.');
            window.location.href = './register';
        </script>
<?php
    }

}

