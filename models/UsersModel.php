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


function loginUser($email, $pwd, PDO $db)
{
    $sql = "SELECT * FROM users
                WHERE email='{$email}'";

    $rs = $db->query($sql);
    $rs = $rs->fetch(2);

    $hash = $rs['pwd'];
    if (password_verify($pwd, $hash)) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }

    return $rs;
}


function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd, PDO $db)
{
    $email = $_SESSION['user']['email'];
    $sql = "SELECT pwd FROM users
            WHERE email='{$email}'";
    $rs = $db->query($sql);
    $hash = $rs->fetch(2)['pwd'];
    if (password_verify($curPwd, $hash)) {
        $newPwd = null;
        if ($pwd1 && ($pwd1 == $pwd2)) {
            $newPwd = password_hash($pwd1, PASSWORD_ARGON2ID);
        }

        $sql = "UPDATE users SET ";
        if ($newPwd) {
            $sql .= "pwd='{$newPwd}', ";
        }
        $sql .= "name='{$name}', phone='{$phone}', address='{$address}' WHERE email='{$email}'";

        return $db->query($sql);
    }
    return false;
}