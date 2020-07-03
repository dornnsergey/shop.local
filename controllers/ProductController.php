<?php

include_once 'models/ProductsModel.php';
include_once 'models/CategoriesModel.php';

function indexAction(Smarty $smarty, PDO $db)
{

    $productId = $_GET['id'] ?? null;
    if ($productId == null) exit();

    $smarty->assign('itemInCart', 0);
    if (in_array($productId, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }

    $rsProduct = getProductById($db, $productId);

    $rsCategories = getAllMainCatsWithChildren($db);

    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');

}
