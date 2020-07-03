<?php

require_once 'models/CategoriesModel.php';
require_once 'models/ProductsModel.php';

function indexAction (Smarty $smarty, PDO $db)
{
    $rsCategories = getAllMainCatsWithChildren($db);
    $rsProducts = getLastProducts($db, 16);

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}