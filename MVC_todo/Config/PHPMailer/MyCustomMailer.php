<?php

namespace Config\PHPMailer;

ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . '/PHPMailer.php');
require_once(__DIR__ . '/SMTP.php');
require_once(__DIR__ . '/Exception.php');


class MyCustomMailer extends PHPMailer
{
    private $_host = 'smtp.gmail.com';
    private $_user = 'diegocaspo2002@gmail.com';
    private $_password = 'Assassino27!';

    public function __construct($exceptions = true)
    {
        $this->isSMTP();
        $this->SMTPDebug = SMTP::DEBUG_CLIENT;
        $this->Host = $this->_host;
        $this->Port = 587;
        $this->Username = $this->_user;
        $this->Password = $this->_password;
        $this->SMTPAuth = true;
        $this->SMTPSecure = parent::ENCRYPTION_STARTTLS;

        parent::__construct($exceptions);
    }

    //   send security code email
    public function sendSecurityCodeEmail($email, $name, $code)
    {

        $mail_subject = "Security code account";
        $html_body = "";
        $mail_body = " Hey here security code is: " . $code;
        $email_sent = self::sendEmail($email, $name, $mail_subject, $html_body, $mail_body);

        return $email_sent;
    }


    public static function sendEmail($to_email, $to_name, $subject, $html_body, $email_body)
    {
        $mail_sent = false;
        try {
            $mail = new PHPMailer;
            $mail->setFrom("noreply@example.com", "Company name");
            $mail->addAddress($to_email, $to_name);
            $mail->Subject = $subject;

            if (!empty($html_body)) {
                $mail->isHTML(true);
                $mail->AltBody = $email_body;
                $mail->Body    = $html_body;
            } else {
                $mail->Body    = $email_body;
            }

            // gmail hack
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            if ($mail->send()) $mail_sent = true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        //self::save_mail($mail);

        return $mail_sent;
    }

    static function save_mail($mail)
    {
        $path = '{imap.gmail.com:993/imap/ssl}[Imap]/Sent';
        $imapStream = imap_open($path, $mail->Username, $mail->Password);

        $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
        imap_close($imapStream);

        return $result;
    }
}
