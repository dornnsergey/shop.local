<?php
error_reporting(E_ALL);



include_once 'config/config.php';
include_once 'library/mainFunctions.php';


$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
$actionName = $_GET['action'] ?? 'index';

loadPage($smarty, $controllerName, $actionName);

