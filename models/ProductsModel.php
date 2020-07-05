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

function getProductsByCat(PDO $db, $catId)
{
    $catId = intval($catId);
    $sql = "SELECT * FROM products
            WHERE category_id={$catId}";

    $rs = $db->query($sql);
    return $rs->fetchAll(2);
}

function getProductById(PDO $db, $productId)
{
    $productId = intval($productId);
    $sql = "SELECT * FROM products
            WHERE id={$productId}";

    $rs = $db->query($sql);
    return $rs->fetch(2);
}

function getProductsFromArray(array $productsIds, PDO $db)
{
    $strIds = implode(', ', $productsIds);
    $sql = "SELECT * FROM products
            WHERE id IN ({$strIds})";

    $rs = $db->query($sql);

    return $rs->fetchAll(2);
}