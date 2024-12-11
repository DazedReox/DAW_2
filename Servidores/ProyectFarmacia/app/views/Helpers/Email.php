<?php

namespace App\Helpers;

class Email
{
    public static function sendEmail($to, $subject, $message)
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@farmacia.com>' . "\r\n";

        if(mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }

    public static function sendHTML($to, $subject, $htmlContent)
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@farmacia.com>' . "\r\n";

        return mail($to, $subject, $htmlContent, $headers);
    }
}
?>
