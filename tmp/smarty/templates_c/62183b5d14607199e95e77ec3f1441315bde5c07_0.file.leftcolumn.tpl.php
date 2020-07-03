<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 22:42:23
  from 'D:\OSPanel\domains\shop.local\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efe389f00c1e1_72467085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62183b5d14607199e95e77ec3f1441315bde5c07' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\leftcolumn.tpl',
      1 => 1593718941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efe389f00c1e1_72467085 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                 <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
                <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
                        --<a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a><br />
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div><?php }
}
