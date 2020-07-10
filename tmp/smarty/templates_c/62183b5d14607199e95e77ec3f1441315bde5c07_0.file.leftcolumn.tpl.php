<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-09 14:43:36
  from 'D:\OSPanel\domains\shop.local\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0702e81525e5_77079531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62183b5d14607199e95e77ec3f1441315bde5c07' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\leftcolumn.tpl',
      1 => 1594295004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0702e81525e5_77079531 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                 <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
                <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
                        --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
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

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
    <div id="userBox">
        <a href="#" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
        <a href="/user/logout/" onclick="logout(); return false">Выход</a>
    </div>
    <?php } else { ?>

        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br />
            <a href="/user/logout/" onclick="logout(); return false">Выход</a>
        </div>

    <!--Авторизация -->
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['hideLoginBox']->value;
$_prefixVariable1 = ob_get_clean();
if (!isset($_prefixVariable1)) {?>
    <div id="loginBox">
        <div class="menuCaption">Авторизация</div>
        <input id="loginEmail" name="loginEmail" value=""><br />
        <input type="password" id="loginPwd" name="loginPwd" value=""><br />
        <input type="button" onclick="login();" value="Войти">
    </div>



    <!--Регистрация -->

    <div id="registerBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
        <div id="registerBoxHidden" class="hideme">
            email:<br />
            <input id="email" name="email" value=""><br />
            пароль:<br />
            <input type="password" id="pwd1" name="pwd1" value=""><br />
            повторить пароль:<br />
            <input type="password" id="pwd2" name="pwd2" value=""><br />
            <input type="button" onclick="registerNewUser();" value="Зарегестрироваться">
        </div>
    </div>
            <?php }?>
    <?php }?>


    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
     <span id="cartCntItems">
         <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
     </span>
</div><?php }
}
