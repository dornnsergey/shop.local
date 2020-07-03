<?php

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';

function indexAction(Smarty $smarty, PDO $db)
{
    $catId = $_GET['id'] ?? null;
    if (!$catId) exit();

    $rsCategory = getCatById($catId, $db);
    exit();
}