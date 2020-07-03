<?php

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';

function addtocartAction()
{
    $productId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $productId) return false;

    $resData = [];

    if (isset($_SESSION['cart']) && array_search($productId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $productId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

function removefromcartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) exit();

    $resData = [];
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}