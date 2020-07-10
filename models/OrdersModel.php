<?php
function makeNewOrder($name, $phone, $address, PDO $db)
{
    $userId = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userId}<br />
               Имя: {$name}<br />
               Тел: {$phone}<br />
               Адрес: {$address}";

    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO orders
           (user_id, date_created, date_payment, status, comment, user_ip)
           VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";
    $rs = $db->query($sql);

    if ($rs) {
        $sql = "SELECT id FROM orders
               ORDER BY id DESC LIMIT 1";
        $rs = $db->query($sql);
        $rs = $rs->fetch(2);

        if (isset($rs['id'])) {
            return $rs['id'];
        }
    }
    return false;
}