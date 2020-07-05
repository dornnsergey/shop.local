function addToCart(itemId) {

        $.ajax({
            type: 'POST',
            url: "/cart/addtocart/" + itemId + '/',
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);

                    $('#addCart_' + itemId).hide();
                    $('#removeCart_' + itemId).show();
                }
            }
        })
}

function removeFromCart(itemId) {

    $.ajax({
        type: 'POST',
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: "json",
        success: function (data) {
            if (data['success']) {
                console.log(data);
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    })
}

function conversionPrice(itemId) {
    console.log(12);
    let newCnt = $('#itemCnt_' + itemId).val();
    console.log(newCnt);
    let itemPrice = $('#itemPrice_' + itemId).attr('value');
    let itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}


function registerNewUser() {
    let postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        url: '/user/register/',
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert('Регистрация прошла успешно');

                $('#registerBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();

                $('#loginBox').hide();
                $('#btnSaveOrder').show();
            } else {
                alert(data['message']);
            }
        }
    })
}

function getData(obj_form) {
    let hData = {};
    $('input, textarea, select', obj_form).each(function () {
         if (this.name && this.name!=''){
             hData[this.name] = this.value;
         }
    });
    return hData;
}