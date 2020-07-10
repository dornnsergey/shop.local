<h1>Корзина</h1>

{if ! $rsProducts}
    В корзине пусто.
  {else}
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
            {foreach $rsProducts as $product name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$product['id']}/" target="_blank">{$product['name']}</a><br /> </td>
                <td>
                    <input name="itemCnt_{$product['id']}" id="itemCnt_{$product['id']}" value="1" onchange="conversionPrice({$product['id']});">
                </td>
                <td>
                    <span id="itemPrice_{$product['id']}" value="{$product['price']}">
                        {$product['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$product['id']}">
                        {$product['price']}
                    </span>
                </td>
                <td>
                    <a id="removeCart_{$product['id']}" {if ! $rsProducts} class="hideme" {/if} href="#" onClick="removeFromCart({$product['id']}); return false" title="Удалить из корзины">Удалить</a>
                    <a id="addCart_{$product['id']}" {if $rsProducts} class="hideme" {/if} href="#" onClick="addToCart({$product['id']}); return false" title="Добавить в корзину">Восстановить</a>
                </td>
            </tr>
            {/foreach}
        </table>
    <input type="submit" value="Оформить заказ">
    </form>
{/if}