
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!empty($_GET['id'])) {
    $option = array(
        'order_by' => 'id'
    );
    $get_user_notActive = get_all('users', $option);
    foreach ($get_user_notActive as $user) {
        if ($user['id'] == $_GET['id']) {
            $email = $user['user_email'];
            $username = $user['user_username'];
            $verification_Code = $user['verificationCode'];
        }
    }
    //send mail
    require 'vendor/autoload.php';
    include 'lib/config/sendmail.php';
    $mail = new PHPMailer(true);
    SendMail($get_user_notActive);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Thành công! Mã kích hoạt</strong> đã được gửi đến email: <strong>" . $email . "</strong>. <br><br>Vui lòng mở hộp thư đến email của bạn và nhấp vào liên kết đã cho để bạn có thể đăng nhập.</div></div>";
    require('content/views/register/result.php');
}
