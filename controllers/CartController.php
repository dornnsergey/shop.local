<?php

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';
include_once 'models/OrdersModel.php';
include_once 'models/PurchaseModel.php';

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

function indexAction(Smarty $smarty, PDO $db)
{
    $productsIds = $_SESSION['cart'] ?? [];


    $rsCategories = getAllMainCatsWithChildren($db);
    $rsProducts = null;
    if (!empty($productsIds)) {
        $rsProducts = getProductsFromArray($productsIds, $db);
    }


    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}


function orderAction(Smarty $smarty, PDO $db)
{
    $itemsIds = $_SESSION['cart'] ?? null;
    if (!$itemsIds) {
        redirect('/cart/');
        return;
    }

    $itemsCnt = [];
    foreach ($itemsIds as $item) {
        $postVar = 'itemCnt_' . $item;
        $itemsCnt[$item] = $_POST[$postVar] ?? null;
    }

    $rsProducts = getProductsFromArray($itemsIds, $db);

    $i = 0;
    foreach ($rsProducts as &$item) {
        $item['cnt'] = $itemsCnt[$item['id']] ?? 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            unset($rsProducts[$i]);
        }
        $i++;
    }
    if (!$rsProducts) {
        echo 'Корзина пуста.';
        return ;
    }

    $_SESSION['saleCart'] = $rsProducts;


    $rsCategories = getAllMainCatsWithChildren($db);

    if (!isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', '1');
    }

    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

function saveorderAction(Smarty $smarty, PDO $db)
{
    $cart = $_SESSION['saleCart'] ?? null;
    if (!$cart) {
        $resData['success'] = 0;
        $resData['message'] = 'Нет товаров для заказа';
        echo json_encode($resData);
        return;
    }
    $name = $_POST['name'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $address = $_POST['address'] ?? null;

    $orderId = makeNewOrder($name, $phone, $address, $db);

    if(!$orderId) {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создания заказа';
        echo json_encode($resData);
        return;
    }

    $res = setPurchaseForOrder($orderId, $cart, $db);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Заказ сохранен';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка для внесения данных заказа ' . $orderId;
    }
    echo json_encode($resData);
}
