<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-06 18:57:07
  from 'D:\OSPanel\domains\shop.local\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0349d3184cc8_56313798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a9bcba9158b9d5e96ba6fb47394d3b0be67e35d' => 
    array (
      0 => 'D:\\OSPanel\\domains\\shop.local\\views\\default\\cart.tpl',
      1 => 1593974188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0349d3184cc8_56313798 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Корзина</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    В корзине пусто.
  <?php } else { ?>
    <form action="/cart/order/" method="post">
    <h2>Данные заказа</h2>
        <table>
            <tr>
                <td>№</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Цена</td>
                <td>Действие</td>
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
</a><br /> </td>
                <td>
                    <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
);">
                </td>
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                    </span>
                </td>
                <td>
                    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?> class="hideme" <?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
); return false" title="Удалить из корзины">Удалить</a>
                    <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['rsProducts']->value) {?> class="hideme" <?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
); return false" title="Добавить в корзину">Восстановить</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    <input type="submit" value="Оформить заказ">
    </form>
<?php }
}
}
