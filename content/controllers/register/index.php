
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

if (!empty($_POST)) {
    $user_add = array(
        'id' => 0,
        'user_username' => escape($_POST['username']),
        'user_password' => md5($_POST['password']),
        'user_email' => escape($_POST['email']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
    );
    global $linkconnectDB;
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);

    $get_user_email_option = array(
        'order_by' => 'id',
    );
    //lấy id người đăng ký để resend
    $user_of_email = get_all('users', $get_user_email_option);
    foreach ($user_of_email as $user) {
        if ($user['user_email'] == $email) {
            $get_userid_of_email = $user['id'];
        }
    }
    $title = 'Kết quả đăng ký thành viên';
    if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_username FROM users WHERE user_username='$username'")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif ($_POST['confirmPassword'] != $_POST['password']) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Việc đăng ký thành viên có vấn đề. Bạn đã không xác thực đúng mật khẩu đã nhập !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email' and verified = 0")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này đã đăng ký nhưng chưa được kích hoạt. nếu bạn đã từng đăng ký với email này vui lòng vào hộp thư đến hoặc kiểm tra trong muc spam sẽ có thư gửi yêu cầu xác nhận. Bạn hãy click vào link, Email sẽ được kích hoạt ngay. <br><br>Bạn có muốn <a href='index.php?controller=register&action=resend&id=" . $get_userid_of_email . "'>gửi lại mã kích hoạt</a> ??<br><br>Hoặc nếu muốn đăng ký thành viên mới hãy <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email'")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } elseif (strlen($_POST['password']) < 8) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Việc đăng ký thành viên có vấn đề. Mật khẩu của bạn phải dài từ 8 ký tự trở lên !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='index.php'>Đến Trang chủ</a></div></div>";
    } else {
        // Load Composer's autoloader
        $user_id = save('users', $user_add);
        //send mail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';

        $mail = new PHPMailer(true);
        SendMail($user_id);
        header("refresh:5;url=" . PATH_URL . "admin.php");
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done! Mã kích hoạt</strong> đã được gửi đến email: <strong>" . $email . "</strong>. <br><br>Vui lòng mở hộp thư đến email của bạn và nhấp vào liên kết đã cho để bạn có thể đăng nhập. <br><br><br>Email chưa được xác minh này đã được lưu vào Database.</div></div>";


//        $mail = new PHPMailer(true);
//
//        try {
//            //Server settings
//            $mail->SMTPDebug = 0;                      //Enable verbose debug output
//            $mail->isSMTP();                                            //Send using SMTP
//            $mail->Host = SMTP_HOST;                     //Set the SMTP server to send through
//            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
//            $mail->Username = SMTP_UNAME;                     //SMTP username
//            $mail->Password = SMTP_PWORD;                               //SMTP password
//            $mail->SMTPSecure = SMTP_SECURE;            //Enable implicit TLS encryption
//            $mail->Port = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//
//            //Recipients
//            $mail->setFrom($mail->Username, 'Mailer');
//            $mail->addAddress($_POST['email'], 'Joe User');     //Add a recipient
////            $mail->addAddress('ellen@example.com');               //Name is optional
////            $mail->addReplyTo('info@example.com', 'Information');
//
////            $mail->addCC('cc@example.com');
////            $mail->addBCC('bcc@example.com');
//
//            //Attachments
////            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
////            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
//
//            //Active
//            $verificationCode = md5(uniqid("Emsel của bạn chưa active. Nhấn vào đây để active nhé!", true)); //https://www.php.net/manual/en/function.uniqid
//            $verificationLink = PATH_URL_LOCAL . "index.php?controller=register&action=activate&code=" . $verificationCode;
//            //Content Mails
//            $htmlStr = "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
//
//
//            echo $verificationLink;
//            //Content
//            $mail->isHTML(true);            //Set email format to HTML
//            $mail->Subject = 'Verification Email';
//            $mail->Body = $htmlStr;
//
//            $mail->send();
////            echo 'Message has been sent';
//        } catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//        }



    }
}
require('content/views/register/result.php');
