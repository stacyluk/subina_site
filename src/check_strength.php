<?php
    use ZxcvbnPhp\Zxcvbn;

    function Check_Strength($password, $username, $email)
    {
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