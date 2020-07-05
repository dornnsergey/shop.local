<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            {foreach $rsCategories as $item}
                 <a href="/category/{$item['id']}/">{$item['name']}</a><br />
                {if isset($item['children'])}
                    {foreach $item['children'] as $child}
                        --<a href="/category/{$child['id']}/">{$child['name']}</a><br />
                    {/foreach}
                {/if}
            {/foreach}
    </div>

    <div id="userBox" class="hideme">
        <a href="#" id="userLink"></a><br />
        <a href="/user/logout/" onclick="logout();">Выход</a>
    </div>

    <!--РегистерБокс -->

    <div id="registerBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
        <div id="registerBoxHidden">
            email:<br />
            <input id="email" name="email" value=""><br />
            пароль:<br />
            <input type="password" id="pwd1" name="pwd1" value=""><br />
            повторить пароль:<br />
            <input type="password" id="pwd2" name="pwd2" value=""><br />
            <input type="button" onclick="registerNewUser();" value="Зарегестрироваться">
        </div>


    </div>


    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзине</a>
     <span id="cartCntItems">
         {if $cartCntItems > 0} {$cartCntItems}{else}пусто{/if}
     </span>
</div>