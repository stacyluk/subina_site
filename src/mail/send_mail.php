<?php
function Send_Mail($to,$subject,$body)
{
    require_once __DIR__.DIRECTORY_SEPARATOR.'PHPMailer.php';
    $from       = "from@yourwebsite.com";
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);            // use SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth   = true;                  // активируем SMTP аутентификацию
    $mail->Host       = 'ssl://smtp.mail.ru'; // SMTP хост
    $mail->Port       =  465;                    // SMTP порт
    $mail->Username   = "shubina.local@mail.ru";  // SMTP  имя пользователя
    $mail->Password   = "4*n@REBkG)P+Dzf";  // SMTP пароль
    $mail->SetFrom($from, 'From Name');
    $mail->AddReplyTo($from,'From Name');
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send();
}