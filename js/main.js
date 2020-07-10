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

function logout() {

    $.ajax({
        type: 'POST',
        url: '/user/logout/',
        success: function () {
            window.location.href = "/";
            $('#registerBox').show();
            $('#userBox').hide();

            $('#loginBox').show();
            $('#btnSaveOrder').hide();
        }
})
}


function login() {
    let email = $('#loginEmail').val();
    let pwd = $('#loginPwd').val();
    let postData = "email=" + email + "&pwd=" + pwd;

    $.ajax({
        type: 'POST',
        url: '/user/login/',
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
                $('#btnSaveOrder').show();

            } else {
                alert(data['message']);
            }
        }
    })
}

function showRegisterBox() {
    $('#registerBoxHidden').toggle();
}


function updateUserData() {

    let phone = $('#newPhone').val();
    let address = $('#newAddress').val();
    let pwd1 = $('#newPwd1').val();
    let pwd2 = $('#newPwd2').val();
    let curPwd = $('#curPwd').val();
    let name = $('#newName').val();

    let postData = {phone: phone,
                    address: address,
                    pwd1: pwd1,
                    pwd2: pwd2,
                    curPwd: curPwd,
                    name: name};

    $.ajax({
        type: 'POST',
        url: '/user/update/',
        data: postData,
        dataType: 'json',
        success: function (data) {
             if (data['success']) {
                 $('#userLink').html(data['userName']);
                 alert(data['message']);
             } else {
                 alert(data['message']);
             }
        }
    })
}


function saveOrder() {
    let postData = getData('form');
    $.ajax({
        type: 'Post',
        url: "/cart/saveorder/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert(data['message']);
                document.location = '/';
            } else {
                alert(data['message']);
            }
        }
    })
}