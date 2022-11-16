// Корзина!!!!!!!
function Items() {
    var check = true;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../main/main.php?check=' + check, true);
    xhr.setRequestHeader('Content-type', 'application/json');
    xhr.send();

    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4)
            return;

        var response = JSON.parse(xhr.responseText);

        if (xhr.status == 200)
            $('#main').append(response);
        $('button.buy').on('click', addToCart);

    }
    return false;
};
var cart = {};

function addToCart() {
    var articul = $(this).attr('data-title');

    if (cart[articul] != undefined) {
        cart[articul]++;
    } else {
        cart[articul] = 1;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
};

function checkCart() {
    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
};

// Каталог

//Вывод всех товаров на начальный экране
$(document).ready(function() {
    $(document).load('../cart/chart_data.json');
    checkCart();


    $(document).ready(function() {
        var check = true;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../header/header.php?check=' + check, true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#headerMain').append(response);
        }
        return false;
    });

    //Вывод всех товаров после применение параметров поиска (сортировка)
    $('#buttonHeader').click(function() {
        var genre_name = $('#genre_name').val();
        var platform_name = $('#platform_name').val();
        var poisk = $('#poisk').val();


        var data = {
            gen: genre_name,
            plat: platform_name,
            poi: poisk,

        }

        data = JSON.stringify(data);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../poisk/poisk.php?', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            console.log(xhr);
            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#main').empty();
            $('#main').append(response);
            $('button.buy').on('click', addToCart);
        }
        return false;
    });
});

//Профиль
function ProfileHistory(data) {
    data = JSON.stringify(data);

    var xhr = new XMLHttpRequest();
    xhr.open('GET', `../root/HistoryConnect.php?id=${data}`, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new FormData();
    formData.append("id", data);

    xhr.send(formData);

    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4)
            return;
        console.log(xhr);
        var response = JSON.parse(xhr.responseText);

        if (xhr.status == 200)
            $('.box_profile_info').empty();
        $('.box_profile_info').append(response);

    }
    return false;
};


function ProfileInfo(login) {
    $('.box_profile_info').empty();
    $('.box_profile_info').append("<button class='changelogin'>Изменить логин</button> ");
    $('.box_profile_info').append("<button class='changepassoword'>Изменить пароль</button> ");


    $('.changepassoword').click(function() {
        $('.box_profile_info').empty();
        $('.box_profile_info').append("<form><br><br><br>Введите старый пароль<br><input type='password' name='oldpass'><br><br>Введите новый пароль<br><input type='password' name='newpass'><br><input type='submit' value='Изменить' name='submitpass'></form>");

        $('input[name="submitpass"]').click(function() {

            var oldpass = $('input[name="oldpass"]').val();
            var newpass = $('input[name="newpass"]').val();

            var checkpasswordchange = true;


            var data = {
                oldpass: oldpass,
                newpass: newpass,
                login: login,
                checkpasswordchange: checkpasswordchange,
            };

            data = JSON.stringify(data);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../root/changeuserconnect.php?', true);
            xhr.setRequestHeader('Content-type', 'application/');
            xhr.send(data);
            console.log(xhr);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;
                var response = JSON.parse(xhr.responseText);
                if (xhr.status == 200)
                    $('.box_profile_info').empty();
                $('.box_profile_info').append(response);
            }
            return false;

        });

    });

    $('.changelogin').click(function() {
        $('.box_profile_info').empty();
        $('.box_profile_info').html("<form><br><br><br>Введите новое имя пользователя<br><input type='text' name='loginnew'><br><br>Введите пароль<br><input type='password' name='password'><br><input type='submit' value='Изменить' name='submitlogin'></form>");

        $('input[name="submitlogin"]').click(function() {
            var loginnew = $('input[name="loginnew"]').val();
            var password = $('input[name="password"]').val();

            var checkloginchange = true;


            var data = {
                newlogin: loginnew,
                oldlogin: login,
                pass: password,
                checkloginchange: checkloginchange
            };

            data = JSON.stringify(data);
            console.log(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../root/changeuserconnect.php?', true);
            xhr.setRequestHeader('Content-type', 'application/');
            xhr.send(data);
            console.log(xhr);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;
                var response = JSON.parse(xhr.responseText);
                if (xhr.status == 200)
                    $('.box_profile_info').empty();
                $('.box_profile_info').append(response);
            }
            alert("Имя пользователя успешно изменено.\n\n        Авторизируйтесь в системе!");
            setTimeout(document.location.href = "http://okeyplay/USERS/unauth.php", 0);
            return false;
        });
    });
};