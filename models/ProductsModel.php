<?php

function getLastProducts(PDO $db, $limit = null)
{
    $sql = "SELECT * FROM products
            ORDER BY id DESC";
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }
    $rs = $db->query($sql);
    return $rs->fetchAll(2);
}