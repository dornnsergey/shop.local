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


function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }

    redirect('/');
}


function loginAction($smarty, PDO $db)
{
    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd = $_REQUEST['pwd'] ?? null;
    $pwd = trim($pwd);

    $userData = loginUser($email, $pwd, $db);

    if ($userData['success']) {
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['email'];


        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверный логин или пароль';
    }
    echo json_encode($resData);
}


function indexAction(Smarty $smarty, $db)
{
    if (!isset($_SESSION['user'])) {
        redirect();
    }

    $rsCategories = getAllMainCatsWithChildren($db);

    $smarty->assign('pageTitle', 'Страница пользователя ' . $_SESSION['user']['displayName']);
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');

}

function updateAction(Smarty $smarty, PDO $db)
{
   if (!isset($_SESSION['user'])) {
       redirect();
   }

    $resData = [];
    $phone = $_REQUEST['phone'] ?? null;
    $address = $_REQUEST['address'] ?? null;
    $name = $_REQUEST['name'] ?? null;
    $pwd1 = $_REQUEST['pwd1'] ?? null;
    $pwd2 = $_REQUEST['pwd2'] ?? null;
    $curPwd = $_REQUEST['curPwd'] ?? null;


    $res = updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd, $db);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $_SESSION['user']['email'];

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;
        $newPwd = password_hash($pwd1, PASSWORD_ARGON2I);
        $_SESSION['user']['pwd'] = $newPwd;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка сохранения данных';
    }
    echo json_encode($resData);
}
