
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function user_login($input, $password)
{
    global $linkconnectDB;
    //autoselect login with username or email : https://stackoverflow.com/questions/16436704/login-with-username-or-email

    // //cách 1
    // if (filter_var($input, FILTER_VALIDATE_EMAIL)) { //https://www.php.net/manual/pt_BR/function.filter-var.php
    //     $type = "user_email";
    // } else {
    //     $type = "user_username";
    // } 
    // $sql = "SELECT * FROM users WHERE $type='$input' AND user_password='$password' LIMIT 0,1";

    // //cách 2
    // if (stripos($input, '@') !== FALSE) {
    //     $sql = "SELECT * FROM users WHERE user_email = '$input' AND user_password='$password' LIMIT 0,1";
    // } else {
    //     $sql = "SELECT * FROM users WHERE user_username = '$input' AND user_password='$password' LIMIT 0,1";
    // }

    //cách 3
    $sql = "SELECT * FROM `users` WHERE (LOWER(`user_username`)='" . strtolower($input) . "' OR
    LOWER(`user_email`)='" . strtolower($input) . "') AND `user_password`='" . $password . "'";

    $query = mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = mysqli_fetch_assoc($query);
        global $user_nav;
        global $email;
        $user_nav = $_SESSION['user']['id'];

        return true;
    }
    return false;
}
function user_delete($id)
{
    $user = get_a_record('users', $id);
    $image = 'public/upload/images/' . $user['user_avatar'];
    if (is_file($image)) {
        unlink($image);
    }
    global $linkconnectDB;
    $id = intval($id);
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function changePassword($id, $newpassword, $currentPassword)
{
    global $linkconnectDB;
    $sql = "Update users SET user_password='$newpassword' WHERE id='$id' AND user_password = '$currentPassword'";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
    $rows =  mysqli_affected_rows($linkconnectDB); //Gets the number of affected rows in a previous MySQL operation
    if ($rows <> 1) {
        return  "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Bạn đã nhập mật khẩu hiện tại không đúng !! <br><a href='javascript: history.go(-1)'>Trở lại</a> hoặc <a href='admin.php'>Đến Dashboard</a></div></div>" . mysqli_error($linkconnectDB);
    } else {
        $options = array(
            'id' => $id,
            'user_password' => $newpassword,
            'editTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)

        );
        save('users', $options);
        //sendmail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        $user = get_a_record('users', $id);
        $email = $user['user_email'];
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
        return '<div style="padding-top: 200" class="container"><div class="alert alert-success" style="text-align: center;"><strong>Tốt!</strong> Bạn đã thay đổi mật khẩu thành công. Và một tin nhắn thông báo đã được gửi đến Email của người dùng này. Hãy <a href="admin.php?controller=home&action=logout">Đăng xuất</a> và đăng nhập lại.!!</div></div>';
    }
}
function user_update()
{
    global $user_nav;
    $user_login = get_a_record('users', $user_nav);
    if ($_POST['user_id'] <> 0) $editTime = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
    else $editTime = '0000-00-00 00:00:00';

    if (isset($_POST['roleid']) && $user_login['role_id'] == 1) $roleid = $_POST['roleid'];
    else $roleid = $user_login['role_id'];

    $user_edit = array(
        'id' => intval($_POST['user_id']),
        'user_email' => escape($_POST['email']),
        'user_username' => escape($_POST['username']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'user_phone' => escape($_POST['phone']),
        'editTime' => $editTime,
        'role_id' => $roleid
    );
    global $linkconnectDB;
    $email_check = addslashes($_POST['email']);
    $id_check = intval($_POST['user_id']);
    if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email_check'")) != 0 && mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE id='$id_check' AND user_email='$email_check'")) <> 1) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/result.php');
        exit;
    } else {
        $get_currentEmail_user = get_a_record('users', $_POST['user_id']);
        $currentEmail = $get_currentEmail_user['user_email'];
        $user_id =  save('users', $user_edit);
        $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);
        $config = array(
            'name' => $avatar_name,
            'upload_path'  => 'public/upload/images/',
            'allowed_exts' => 'jpg|jpeg|png|gif',
        );
        $avatar = upload('imagee', $config);
        //cập nhật ảnh mới
        if ($avatar) {
            $user_edit = array(
                'id' => $user_id,
                'user_avatar' => $avatar
            );
            save('users', $user_edit);
        }
        header('location:admin.php?controller=user&action=info&user_id=' . intval($_POST['user_id']));
    }
}
function user_add()
{
    $user_add = array(
        'id' => intval($_POST['user_id']),
        'user_username' => escape($_POST['username']),
        'user_password' => md5($_POST['password']),
        'user_email' => escape($_POST['email']),
        'role_id' => escape($_POST['roleid']),
        'user_name' => escape($_POST['name']),
        'user_address' => escape($_POST['address']),
        'createDate' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'user_phone' => escape($_POST['phone'])
    );
    global $linkconnectDB;
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    //https://freetuts.net/xay-dung-chuc-nang-dang-nhap-va-dang-ky-voi-php-va-mysql-85.html
    if (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_username FROM users WHERE user_username='$username'")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } elseif (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } elseif (strlen($_POST['password']) < 8) {
        echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Mật khẩu bạn nhập phải dài từ 8 ký tự trở lên !! <br><a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        exit;
    } elseif (mysqli_num_rows(mysqli_query($linkconnectDB, "SELECT user_email FROM users WHERE user_email='$email'")) > 0) {
        echo "<div style='padding-top: 200' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a></div></div>";
        require('admin/views/user/addresult.php');
        exit;
    } else {
        $user_id =  save('users', $user_add);
        $avatar_name = 'avatar-user' . $user_id . '-' . slug($_POST['username']);
        $config = array(
            'name' => $avatar_name,
            'upload_path'  => 'public/upload/images/',
            'allowed_exts' => 'jpg|jpeg|png|gif',
        );
        $avatar = upload('imagee', $config);
        if ($avatar) {
            $user_add = array(
                'id' => $user_id,
                'user_avatar' => $avatar
            );
            save('users', $user_add);
        }
        //send mail
        require 'vendor/autoload.php';
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);
        SendMail($user_id);
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
//        $verificationCode_add = array(
//            'id' => $user_id,
//            'verificationCode' => $verificationCode,
//            'verified' => 0
//        );
//        save('users', $verificationCode_add);
        header('location:admin.php?controller=user&action=info&user_id=' . $user_id);
    }
}
