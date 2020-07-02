<?php

const PATH_PREFIX = 'controllers/';
const PATH_POSTFIX = 'Controller.php';

$template = 'default';

define('TEMPLATE_PREFIX', "views/{$template}/");
define('TEMPLATE_POSTFIX', ".tpl");
define('TEMPLATE_WEB_PATH', "templates/{$template}/");

 require 'library/Smarty/libs/Smarty.class.php';
 $smarty = new Smarty();

 $smarty->setTemplateDir(TEMPLATE_PREFIX);
 $smarty->setCompileDir('tmp/smarty/templates_c');
 $smarty->setCacheDir('tmp/smarty/cache');
 $smarty->setConfigDir('library/Smarty//configs');

 $smarty->assign('templateWebPath', TEMPLATE_WEB_PATH);

