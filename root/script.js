//Расскрывает меню
$(document).ready(function() {
    $(document).ready(function() {
        $('.move').css({ 'display': 'none' });
        $('.menu').click(function() {
            $(this).next('.move').slideToggle(500)
        });
    });
    //Выводит настройки поиска для пользователей
    $(document).ready(function() {
        var check = true;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'headerPoisk.php?check=' + check, true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#poiskRoot').append(response);

            buttonPoiskAdmin()
        }
        return false;
    });
    //Админ: поиск товаров при нажатии на кнопку
    function buttonPoiskAdmin() {
        $('button[name="sendData"]').click(function() {
            var genre_name = $('#genrePoisk').val();
            var platform_name = $('#platformPoisk').val();
            var poisk = $('#poiskPoisk').val();


            var data = {
                gen: genre_name,
                plat: platform_name,
                poi: poisk,

            }

            data = JSON.stringify(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'poiskAdmin.php?', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;

                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200)
                    $('#allProductsAdmin').empty();
                $('#allProductsAdmin').append(response);
                buttonDelete();
                buttonChange();

            }
            return false;
        });
    }

    //Вывод таблицу со списком товаров
    $(document).ready(function() {
        productOutputAdmin();
    });
    //Админ: Генерирует таблицу товаров
    function productOutputAdmin() {
        var allProductsAdmin = true;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'logicaphp.php?allProductsAdmin=' + allProductsAdmin, true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200) {
                $('#allProductsAdmin').empty();
                $('#allProductsAdmin').append(response);
                buttonDelete();
                buttonChange();
            }
        }
        return false;
    }

    //Удаление товара (кнопка)
    function buttonDelete() {
        $('button[name="delete"]').click(function() {
            var id = $(this).attr("value");
            var type = $(this).attr("name");

            var data = {
                id: id,
                type: type
            }

            data = JSON.stringify(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'productOperations.php', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;

                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200)
                    alert('Товар удалён!');
                $('#allProductsAdmin').empty();
                $('#allProductsAdmin').append(response);
                buttonDelete();
                buttonChange();
            }
            return false;
        });
    }
    //Вывод формы для изменения инфы о товаре
    function buttonChange() {
        $('button[name="change"]').click(function() {
            var id = $(this).attr("value");
            var type = $(this).attr("name");

            var data = {
                id: id,
                type: type
            }

            data = JSON.stringify(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'productOperations.php', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;

                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200)
                    $('#allProductsAdmin').empty();
                $('#allProductsAdmin').append(response);
                buttonChangeData();

            }
            return false;
        });
    }
    //Изменяет параметры товара
    function buttonChangeData() {
        $('button[name="changeData"]').click(function() {

            var id = $('#buttonChangeProductsValuesSend').val();
            var name = $('#selectСhangeProductName').val();
            var platform_name = $('#selectСhangePlatform').val();
            var genre_name = $('#selectСhangeGenre').val();
            var language = $('#selectСhangeLanguage').val();
            var release_date = $('#selectСhangeRelease_date').val();
            var publisher = $('#selectСhangePublisher').val();
            var kolvo = $('#selectСhangeKolvo').val();
            var price = $('#selectСhangePrice').val();
            var picture = $('#selectСhangePicture').val();

            var data = {
                id: id,
                name: name,
                platform_name: platform_name,
                genre_name: genre_name,
                language: language,
                release_date: release_date,
                publisher: publisher,
                kolvo: kolvo,
                price: price,
                picture: picture
            }

            console.log(data);
            data = JSON.stringify(data);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'changeProductData.php', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.send(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;

                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200)
                    alert(response);
                updateTable();

            }
            return false;

        });
    }
    //Обновление таблицы после изменения параметров
    function updateTable() {
        productOutputAdmin()
    }

    //Выводит форму для добавления нового товара
    $(document).ready(function() {
        var checkAddProduct = true;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'logicaphp.php?checkAddProduct=' + checkAddProduct, true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#addProductValue').append(response);
        }
        return false;
    });
    //Добавляет товар
    $('#addProductSend').click(function() {
        var name = $('#nameProduct').val();
        var platform_name = $('#platform_name').val();
        var genre_name = $('#genre_name').val();
        var language = $('#language').val();
        var release_date = $('#release_date').val();
        var publisher = $('#publisher').val();
        var kolvo = $('#kolvo').val();
        var price = $('#price').val();
        var picture = $('#picture').val();

        var addProduct = {
            name: name,
            platform_name: platform_name,
            genre_name: genre_name,
            language: language,
            release_date: release_date,
            publisher: publisher,
            kolvo: kolvo,
            price: price,
            picture: picture
        }
        console.log(addProduct);
        addProduct = JSON.stringify(addProduct);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'addProduct.php?', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(addProduct);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#nameProduct').val('');
            $('#platform_name').val('');
            $('#genre_name').val('');
            $('#language').val('');
            $('#release_date').val('');
            $('#publisher').val('');
            $('#kolvo').val('');
            $('#price').val('');
            $('#picture').val('');
            alert(response);
        }
        return false;
    });
    //Сброс значений для товаров
    $(document).ready(function() {
        $('#addGenreValue').val('');
        $('#addPlatformValue').val('');
    });
    //Создание нового жанра
    $('#addGenreSend').click(function() {
        var addGenre = $('#addGenreValue').val();
        var addParameter = {
            value: addGenre,
            check: 1,
        }

        addParameter = JSON.stringify(addParameter);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add.php?', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(addParameter);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#addGenreValue').val('');
            alert(response);
        }
        return false;
    });
    //Создание новой платформы
    $('#addPlatformSend').click(function() {
        var addPlatform = $('#addPlatformValue').val();
        var addParameter = {
            value: addPlatform,
            check: 2,
        }

        addParameter = JSON.stringify(addParameter);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add.php?', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(addParameter);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4)
                return;

            var response = JSON.parse(xhr.responseText);

            if (xhr.status == 200)
                $('#addPlatformValue').val('');
            alert(response);
        }
        return false;
    });

});