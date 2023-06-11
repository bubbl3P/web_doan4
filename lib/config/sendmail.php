<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
error_reporting(0);
//define('SMTP_HOST','smtp.gmail.com');
//define('SMTP_PORT','465');
//define('SMTP_UNAME','dndb20011512@gmai.com');
//define('SMTP_PWORD','bajfihwysfgoslle');
function SendMail($user_id)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'dndb20011512@gmail.com';                     //SMTP username
        $mail->Password = 'aemsanoqlbxroqbe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($mail->Username, 'Mailer');
        $mail->addAddress($_POST['email'], 'Joe User');     //Add a recipient
//            $mail->addAddress('ellen@example.com');               //Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');

//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

        //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Active
        $verificationCode = md5(uniqid("Emsel của bạn chưa active. Nhấn vào đây để active nhé!", true)); //https://www.php.net/manual/en/function.uniqid
        $verificationLink = PATH_URL_LOCAL . "index.php?controller=register&action=activate&code=" . $verificationCode;

        //Content Mails
        $htmlStr = "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";

        //Content
        $mail->isHTML(true);            //Set email format to HTML
        $mail->Subject = 'Verification Email';
        $mail->Body = $htmlStr;

        $mail->send();
//            echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $verificationCode_add = array(
        'id' => $user_id,
        'verificationCode' => $verificationCode
    );
    save('users', $verificationCode_add);

}