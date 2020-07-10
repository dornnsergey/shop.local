<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-05 15:39:14
  from 'D:\OSPanel\domains\shop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f01c9f23031b5_46412711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f7cbc7a25dee714d4032a9a4017545cd34fa033' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\user.tpl',
      1 => 1593952594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f01c9f23031b5_46412711 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Регистрационные данные:</h1>
<table border="0">
    <tr>
        <td>Логин (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAddress" ><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea> </td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" value=""></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" value=""></td>
    </tr>
    <tr>
        <td>Ваш текущий пароль для сохранения новых данных</td>
        <td><input type="password" id="curPwd" value=""></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" id="curPwd" value="Сохранить изменения" onclick="updateUserData();"></td>
    </tr>
</table><?php }
}
