<?php
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



include_once 'config/config.php';
include_once 'config/db.php';
include_once 'library/mainFunctions.php';


$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$actionName = $_GET['action'] ?? 'index';

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName, $db);

