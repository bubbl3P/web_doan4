<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

error_reporting(0);
//define('SMTP_HOST','smtp.gmail.com');
//define('SMTP_PORT','465');
//define('SMTP_UNAME','dndb20011512@gmai.com');
//define('SMTP_PWORD','bajfihwysfgoslle');
function SendMail_Order($data)
{
    $mail = new PHPMailer(true);
    try {
        global $email;
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
        $mail->setFrom($mail->Username, 'Shop KTPM');
        $mail->addAddress($data[0]['user_email'], 'Joe User');
        //Add a recipient
//            $mail->addAddress('ellen@example.com');               //Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');

//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

        //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Active

        //Content Mails
        $path = 'localhost' . PATH_URL . 'admin.php?controller=purchase';
        $htmlStr = "<div>Kính chào quý khách hàng {$data[0]['user_name']}</div> 
                    <div>Cảm ơn quý khách hàng đã tin tưởng và ủng hộ shop ! </div>
                    <div>Hoá đơn mua hàng của quý khách được tạo vào lúc {$data[0]['createtime']}</div>
                    <table class='table table-striped'>
                        <thead>
                          <tr>
                            <th>Tên khách hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền </th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{$data[0]['user_name']}</td>
                                <td>{$data[0]['product_name']}</td>
                                <td>{$data[0]['quantity']}</td>
                                <td>{$data[0]['product_price']}</td>
                            </tr>
                            <tr>
                                <td>{$data[1]['user_name']}</td>
                                <td>{$data[1]['product_name']}</td>
                                <td>{$data[1]['quantity']}</td>
                                <td>{$data[1]['product_price']}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Tổng tiền: </td>
                                <td>{$data[0]['cart_total']}</td>
                            </tr>

                        </tbody>
                      </table>
                      <div>Bạn có thể click vào đường dẫn này để xem chi tiết đơn hàng<a href='$path'>Tại đây</a></div>
                    
                    
                    
                        ";




        //Content
        $mail->isHTML(true);            //Set email format to HTML
        $mail->Subject = 'Thông Tin Đơn Hàng Bạn Đã Đặt Từ Shop KTPM';
        $mail->Body = $htmlStr;

        $mail->send();
//            echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}