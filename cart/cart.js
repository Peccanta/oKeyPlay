var cart = {};
$.getJSON('chart_data.json', function(data) {
    var goods = data;
    checkCart();
    ShowAllCart();

    function ShowAllCart() {
        if ($.isEmptyObject(cart)) {
            var out = '<p class="pusto"><br><br><br><br>В ВАШЕЙ КОРЗИНЕ ЕЩЁ НИЧЕГО НЕТ :(</p><br><a href="../root/catalog.php" class="silka">ДОБАВИТЬ ТОВАР</a>';
            $('.zakaz').html(out);
        } else {
            var out = '';
            for (var key in cart) {
                out += '<div id="product"><p>' + '<img src="' + goods[key].picture + '"></img></p>';
                out += '<p>' + goods[key].product_name + '<br>' + '<br>';
                out += '<span class="Value" >Количество: ' + '<br>' + '<button class="minus_goods" data-art="' + key + '">-</button>' + '&nbsp;' + cart[key] + '&nbsp;' + '<button class="plus_goods" data-art="' + key + '">+</button></span><br>';
                out += 'Цена: ' + goods[key].price * cart[key] + ' ₽' + '<br>';
                out += '<button class="delete_goods" data-art="' + key + '">УДАЛИТЬ ТОВАР</button><br></div>';

            }

            summAll();
            $('#main').html(out);
            $('.plus_goods').on('click', plusGoods);
            $('.minus_goods').on('click', minusGoods);
            $('.delete_goods').on('click', deleteGoods);
            $('#delete_goods').on('click', deleteALL);
        }
    };
    $('input[name=submit_class_button]').on('click', SubmitGoods);

    function zakazgood() {
        window.location.href = '../root/catalog.php';
        localStorage.clear(cart);
    }

    function SubmitGoods() {
        var out = '';
        var phone = $('input[name=phone]').val();
        var email = $('input[name=email]').val();
        var login = $('input[name=login]').val();

        var price = $('#price_form').attr('data-price');

        var data = {
            login: login,
            phone: phone,
            email: email,
            price: price,
            art: cart
        }
        console.log(data);
        data = JSON.stringify(data);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'OrdersConnect.php?', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;
            if (xhr.status == 200) {
                alert("Ваш заказ успешно оформлен.\n\n        Спасибо за покупку!");
                setTimeout(zakazgood, 0);
            }
        }
        return false;
    }

    function summAll() {
        var summgoods = [];

        for (var key in cart) {
            summgoods.push(goods[key].price * cart[key]);
        }
        const reducer = (accumulator, currentValue) => accumulator + currentValue;

        var out = '';
        out += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ИТОГО <br>';
        out += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span name="price" id="price_form" data-price="' + summgoods.reduce(reducer) + '">' + summgoods.reduce(reducer) + '</span>';
        out += ' ₽'
        $('.mini_cart_summ').html(out);
    }

    function plusGoods() {
        var articul = $(this).attr('data-art');
        cart[articul]++;

        ShowAllCart();
        saveCartLS();
    }

    function minusGoods() {
        var articul = $(this).attr('data-art');
        if (cart[articul] > 1) {
            cart[articul]--;
        } else {
            delete cart[articul];
        }

        ShowAllCart();
        saveCartLS();
    }

    function deleteGoods() {
        var articul = $(this).attr('data-art');
        delete cart[articul];
        ShowAllCart();
        saveCartLS();
    }

    function deleteALL() {
        localStorage.clear(cart)
        ShowAllCart();
        window.location.href = '../root/catalog.php';
    }

    modalWindow();
});


function checkCart() {
    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
}

function saveCartLS() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function modalWindow() {
    /*Модальное окно*/
    var modal = document.querySelector("#modal"),
        modalOverlay = document.querySelector("#modal-overlay"),
        closeButton = document.querySelector("#close-button"),
        openButton = document.querySelector("#open-button");

    closeButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
    });

    openButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
    });
}