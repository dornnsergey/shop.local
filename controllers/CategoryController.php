<?php

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';

function indexAction(Smarty $smarty, PDO $db)
{
    $rsChildCats = null;
    $rsProducts = null;

    $catId = $_GET['id'] ?? null;
    if (!$catId) exit();

    $rsCategory = getCatById($catId, $db);


    if ($rsCategory['parent_id'] == 0) {
        $rsChildCats = getChildrenForCat($catId, $db);
    } else {
        $rsProducts = getProductsByCat($db, $catId);
    }

    $rsCategories = getAllMainCatsWithChildren($db);

    $smarty->assign('pageTitle', 'Товары категории ' . $rsCategory['name']);
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}