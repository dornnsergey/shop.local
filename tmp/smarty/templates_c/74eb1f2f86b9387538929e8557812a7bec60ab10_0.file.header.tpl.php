<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-03 20:03:19
  from 'D:\OSPanel\domains\shop.local\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eff64d7c9beb9_36031726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74eb1f2f86b9387538929e8557812a7bec60ab10' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\header.tpl',
      1 => 1593795798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5eff64d7c9beb9_36031726 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="/<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
        <?php echo '<script'; ?>
 src="/js/main.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/js/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
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
