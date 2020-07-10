<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-09 14:34:38
  from 'D:\OSPanel\domains\shop.local\views\default\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0700ceca59d1_22364488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50274178682a3b264fc140ec6b28bd7461b29c95' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\order.tpl',
      1 => 1594294405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0700ceca59d1_22364488 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="post">
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
                <td><span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['cnt'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['cnt'];?>

                    </span>
                </td>
                <td><span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                    </span></td>
                <td><span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['realPrice'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['realPrice'];?>

                    </span></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
        <h2>Данные заказчика</h2>
        <div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['arUser']->value['name']);?>
            <?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['arUser']->value['phone']);?>
            <?php $_smarty_tpl->_assignInScope('address', $_smarty_tpl->tpl_vars['arUser']->value['address']);?>
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address"><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td><input id="loginEmail" name="loginEmail" value=""></td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td><input type="password" id="loginPwd" name="loginPwd" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="login();" value="Войти"></td>
                </tr>
            </table>
        </div>
        <div id="registerBox">или <br />
            <div class="menuCaption">Регистрация нового пользователя:</div>
            email:<br />
            <input id="email" name="email" value=""><br />
            пароль:<br />
            <input type="password" id="pwd1" name="pwd1" value=""><br />
            повторить пароль:<br />
            <input type="password" id="pwd2" name="pwd2" value=""><br />
            Имя*:<br />
            <input type="text" id="name" name="name" value=""><br />
            Тел*:<br />
            <input type="text" id="phone" name="phone" value=""><br />
            Адрес*:<br />
            <textarea id="address" name="address"></textarea><br />
            <input type="button" onclick="registerNewUser();" value="Зарегестрироваться">
        </div>
        <?php $_smarty_tpl->_assignInScope('buttonClass', "class='hideme'");?>
    <?php }?>
    <input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();">

</form><?php }
}
