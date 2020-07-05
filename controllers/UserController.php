<?php

include_once 'models/CategoriesModel.php';
include_once 'models/UsersModel.php';

function registerAction($smarty, PDO $db)
{
    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd1 = $_REQUEST['pwd1'] ?? null;
    $pwd2 = $_REQUEST['pwd2'] ?? null;

    $phone = $_REQUEST['phone'] ?? null;
    $address = $_REQUEST['address'] ?? null;
    $name = $_REQUEST['name'] ?? null;
    $name = trim($name);


    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if (!$resData && checkUserEmail($email, $db)) {
        $resData['success'] = false;
        $resData['message'] = 'Пользователь с таким email (' . $email . ') уже зарегестрирован';
    }

    if (!$resData) {
        $pwd = password_hash($pwd1, PASSWORD_ARGON2I);


        $userData = registerNewUser($email, $pwd, $name, $phone, $address, $db);

        if ($userData['success']) {
            $resData['message'] = 'Пользователь успешно зарегестрирован';
            $resData['success'] = 1;

            $resData['userName'] = !empty($userData['name'])  ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ?? $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    echo json_encode($resData);
}
