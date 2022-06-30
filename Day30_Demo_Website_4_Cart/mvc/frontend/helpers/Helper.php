<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'libraries/PHPMailer/src/Exception.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';

/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 5/2/2020
 * Time: 10:14 AM
 */
class Helper
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE_TEXT = 'Active';
    const STATUS_DISABLED_TEXT = 'Disabled';
    // Tài khoản Gmail
    const MAIL_USERNAME = '';
    //Mật khẩu ứng dụng
    const MAIL_PASSWORD = '';

    /**
     * Gửi mail sử dụng thư viện PHPMailer
     * @param $to string Email nhận
     * @param $subject string Tiêu đề mail
     * @param $body string Nội dung mail
     */
    public static function sendMail($to, $subject, $body)
    {
// Copy thư mục PHPMailer vào cùng cấp file hiện tại

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

// - Nhúng thủ công các file theo đúng thứ tự sau:

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->CharSet = 'utf8'; //fix gửi mail lỗi font có dấu
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = self::MAIL_USERNAME;                     //SMTP username
            $mail->Password = self::MAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //https://myaccount.google.com/
            //Recipients
            $mail->setFrom(self::MAIL_USERNAME, self::MAIL_USERNAME);
//    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress($to);               //Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

            //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
//            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     * Get status text
     * @param int $status
     * @return string
     */
    public static function getStatusText($status = 0)
    {
        $status_text = '';
        switch ($status) {
            case self::STATUS_ACTIVE:
                $status_text = self::STATUS_ACTIVE_TEXT;
                break;
            case self::STATUS_DISABLED:
                $status_text = self::STATUS_DISABLED_TEXT;
                break;
        }
        return $status_text;
    }

    /**
     * Chuyển đổi chuỗi ký tự có dấu thành chuỗi ký tự không dấu, ngăn cách  nhau bởi ký tự -
     * @param $str
     * @return null|string|string[]
     */
    public static function getSlug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

}