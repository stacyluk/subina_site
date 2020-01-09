<?php
namespace ZxcvbnPhp;

function Check_Strength($password, $username, $email)
{
    require_once __DIR__.DIRECTORY_SEPARATOR.'Zxcvbn.php';
    $userData = [
        $username,
        $email
    ];

    $zxcvbn = new Zxcvbn();
    $strength = $zxcvbn->passwordStrength($password, $userData);
    $message = $strength['score'];

    if (!empty($message)) {
        return $message;
    }
}