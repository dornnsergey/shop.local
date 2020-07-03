<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 21:32:40
  from 'D:\OSPanel\domains\shop.local\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efe28481e1682_17294717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74eb1f2f86b9387538929e8557812a7bec60ab10' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\header.tpl',
      1 => 1593714561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5efe28481e1682_17294717 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
    </head>
    <body>
    <div id="header">
    <h1>Shop Local - интернет магазин</h1>
    </div>

    <?php $_smarty_tpl->_subTemplateRender('file:leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



    <div id="centerColumn">
<?php }
}
