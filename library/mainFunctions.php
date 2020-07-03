<?php

function loadPage(Smarty $smarty, string $controllerName, string $actionName = 'index', PDO $db)
{
    include_once PATH_PREFIX . $controllerName . PATH_POSTFIX;
    $function = $actionName . 'Action';
    $function($smarty, $db);
}

function loadTemplate(Smarty $smarty, string $templateName)
{
    $smarty->display($templateName . TEMPLATE_POSTFIX);
}