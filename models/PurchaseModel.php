<?php


function setPurchaseForOrder($orderId, $cart, PDO $db)
{
    $sql = "INSERT INTO purchase
           (order_id, product_id, price, amount) 
           VALUES ";

    $values = [];

    foreach ($cart as $item) {
        $values[] = "('{$orderId}', '{$item['id']}',  '{$item['price']}', '{$item['cnt']}')";
    }

    $sql .= implode(', ', $values);
    return $db->query($sql);
}