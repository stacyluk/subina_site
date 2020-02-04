<?php
namespace scripts;
use PHPMailer\PHPMailer\PHPMailer;

function Send_Mail($to, $subject, $body)
{
    $from = "stacy.sh78@mail.ru";
    $mail = new PHPMailer();
    $mail->IsSMTP(true);            // use SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth = true;                  // активируем SMTP аутентификацию
    $mail->Host = 'smtp.mail.ru'; // SMTP хост
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;                    // SMTP порт
    $mail->Username = SMTP_USER;  // SMTP  имя пользователя
    $mail->Password = SMTP_PASS;  // SMTP пароль
    $mail->SetFrom($from, 'Admin');
    $mail->AddReplyTo($from, 'Admin');
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    if ($mail->Send()) {
        $message = 'Письмо отправленно';
    } else {
        $message = 'Сообщение не было отправленно! Неверно указаны настройки вашей почты.';
    }

    if (!empty($message)) {
        return $message;
    }
}
