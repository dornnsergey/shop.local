<?php

function registerNewUser( $email,  $pwd,  $name,  $phone,  $address, PDO $db)
{


    $sql = "INSERT INTO users
            (`email`, `pwd`, `name`, `phone`, `address`) 
            VALUES ('{$email}', '{$pwd}', '{$name}', '{$phone}', '{$address}')";

    $rs = $db->query($sql);


    if ($rs) {
        $sql = "SELECT * FROM users
                WHERE email='{$email}' and pwd='{$pwd}'";

        $rs = $db->query($sql);
        $rs = $rs->fetch(2);

        if (isset($rs['id'])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}


function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }

    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }

    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля';
    }

    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }
    return $res;
}

function checkUserEmail($email, PDO $db)
{
    $sql = "SELECT * FROM users
            WHERE email='{$email}'";

    $rs = $db->query($sql);
    return $rs->fetch(2);

}