<?php
function Generate_Pw()
{
    $num = 10;

    $arr = array(
        'a', 'b', 'c', 'd', 'e', 'f',
        'g', 'h', 'i', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'r', 's',
        't', 'u', 'v', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F',
        'G', 'H', 'I', 'J', 'K', 'L',
        'M', 'N', 'O', 'P', 'R', 'S',
        'T', 'U', 'V', 'X', 'Y', 'Z',
        '1', '2', '3', '4', '5', '6',
        '7', '8', '9', '0', '.', ',',
        '(', ')', '[', ']', '!', '?',
        '&', '^', '%', '@', '*', '$',
        '<', '>', '/', '|', '+', '-',
        '{', '}', '`', '~'
    );

    // generate new password
    $pass = "";
    for ($i = 0; $i < $num; $i++) {
        // calculate a random array index
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
    }
    return $pass;
}
