<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="post">
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        {foreach $rsProducts as $product name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$product['id']}/" target="_blank">{$product['name']}</a></td>
                <td><span id="itemCnt_{$product['id']}">
                <input type="hidden" name="itemCnt_{$product['id']}" value="{$product['cnt']}">{$product['cnt']}
                    </span>
                </td>
                <td><span id="itemPrice_{$product['id']}">
                <input type="hidden" name="itemPrice_{$product['id']}" value="{$product['price']}">{$product['price']}
                    </span></td>
                <td><span id="itemRealPrice_{$product['id']}">
                <input type="hidden" name="itemRealPrice_{$product['id']}" value="{$product['realPrice']}">{$product['realPrice']}
                    </span></td>
            </tr>
        {/foreach}
    </table>

    {if isset($arUser)}
        {$buttonClass = ''}
        <h2>Данные заказчика</h2>
        <div id="orderUserInfoBox" {$buttonClass}>
            {$name = $arUser['name']}
            {$phone = $arUser['phone']}
            {$address = $arUser['address']}
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input id="name" name="name" value="{$name}"></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input id="phone" name="phone" value="{$phone}"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address">{$address}</textarea></td>
                </tr>
            </table>
        </div>
    {else}
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
        {$buttonClass = "class='hideme'"}
    {/if}
    <input {$buttonClass} id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();">

</form>