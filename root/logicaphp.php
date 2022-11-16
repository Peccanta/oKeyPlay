<?php
    include '../baza.php';

    $checkAllProducts = false;
    $checkAllProducts = $_GET['checkAllProducts'];
    $allProductsAdmin = false;
    $allProductsAdmin = $_GET['allProductsAdmin'];
    $checkAllGenre = false;
    $checkAllGenre = $_GET['checkAllGenre'];
    $checkAddProduct = false;
    $checkAddProduct = $_GET['checkAddProduct'];
    $checkDeleteProduct = false;
    $checkDeleteProduct = $_GET['checkDeleteProduct'];
    $checkSelectProduct = false;
    $checkSelectProduct = $_GET['checkSelectProduct'];

    if ($checkAllProducts) {
        $query = "SELECT product.id_product, product.product_name, platform.platform_name, genre.genre_name, product.language, product.release_date, product.publisher, product.kolvo, product.price, product.picture FROM platform, product, genre WHERE platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre";
        $result = mysqli_query($link,$query);
        if ($result) {
            $table = '<table border = 1px><tr><td>Номер товара</td><td>Название товара</td><td>Платформа</td><td>Жанр</td><td>Язык</td><td>Дата выхода</td><td>Издатель</td><td>Количество</td><td>Цена</td><td>Изображение</td></tr>';           
            while ($product = mysqli_fetch_assoc($result)) 
                $table .= '<tr><td>'.$product['id_product'].'</td><td>'.$product['product_name'].'</td><td>'.$product['platform_name'].'</td><td>'.$product['genre_name'].'</td><td>'.$product['clas_name'].'</td><td>'.$product['kolvo'].'</td><td>'.$product['price'].'</td><td><img src="'.$product['picture'].'" width="150" height="200"></td></tr>';
            $table .= '</table>';
    
            mysqli_free_result($result);
            echo json_encode($table);
        }
    }

    if ($allProductsAdmin) {
        $query = "SELECT product.id_product, product.product_name, platform.platform_name, genre.genre_name, product.language, product.release_date, product.publisher, product.kolvo, product.price, product.picture FROM platform, product, genre WHERE platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre";
        $result = mysqli_query($link,$query);
        if ($result) {
            $table = '<table border = 1px><tr><td>Номер товара</td><td>Название товара</td><td>Платформа</td><td>Жанр</td><td>Язык</td><td>Дата выхода</td><td>Издатель</td><td>Количество</td><td>Цена</td><td>Изображение</td><td id="t1">✎</td><td id="t2">✖</td></tr>';    
            while ($product = mysqli_fetch_assoc($result)){
                $table .= '<tr>';
                $table .= '<td>'.$product['id_product'].'</td>';
                $table .= '<td>'.$product['product_name'].'</td>';
                $table .= '<td>'.$product['platform_name'].'</td>';
                $table .= '<td>'.$product['genre_name'].'</td>';
                $table .= '<td>'.$product['language'].'</td>';
                $table .= '<td>'.$product['release_date'].'</td>';
                $table .= '<td>'.$product['publisher'].'</td>';
                $table .= '<td>'.$product['kolvo'].'</td>';
                $table .= '<td>'.$product['price'].'</td>';
                $table .= '<td><img src="'.$product['picture'].'" width="150" height="200"></td>';
                $table .= '<td><button type="button" name="change" value="'.$product['id_product'].'">Изменить</button></td>';
                $table .= '<td><button type="button" name="delete" value="'.$product['id_product'].'">Удалить</button></td>';
                $table .= '</tr>';
            }   
            $table .= '</table>';
    
            mysqli_free_result($result);
            echo json_encode($table);
        }
    }

    if ($checkAllGenre) {
        $query = "SELECT * FROM `genre`";
        $result = mysqli_query($link,$query);
        if ($result) {
            $table = '<table border = 1px><tr><td>Номер жанра</td><td>Жанр</td></tr>';           
            while ($genre_name = mysqli_fetch_assoc($result)) 
                $table .= '<tr><td>'.$genre_name['id_genre'].'</td><td>'.$genre_name['genre_name'].'</td></tr>';
            $table .= '</table>';
    
            mysqli_free_result($result);
            echo json_encode($table);
        }
    }

    if ($checkAddProduct) {
        $addProduct = '<p>Введите название товара: <input type="text" id="nameProduct"></p>'; 

        $query = "SELECT * FROM platform";
        $result = mysqli_query($link,$query);
        if ($result) {    
            $addProduct .= '<p>Выберите платформу: <select id="platform_name"><option value="">Выберите платформу</option>';   
            while ($product = mysqli_fetch_assoc($result))
                $addProduct .= '<option value="'.$product['id_platform'].'">'.$product['platform_name'].'</option>';
            $addProduct .= '</select></p>';
            mysqli_free_result($result); 
        }

        $query = "SELECT * FROM `genre`";
        $result = mysqli_query($link,$query);
        if ($result) {  
            $addProduct .= '<p>Выберите жанр: <select id="genre_name"><option value="">Выберите жанр</option>';      
            while ($product = mysqli_fetch_assoc($result)) 
                $addProduct .= '<option value="'.$product['id_genre'].'">'.$product['genre_name'].'</option>';
            $addProduct .= '</select></p>';
            mysqli_free_result($result); 
        }

        $addProduct .= '<p>Введите язык: <input type="text" id="language"><p>Введите дату выхода: <input type="text" id="release_date"></p><p>Введите издателя: <input type="text" id="publisher"></p><p>Введите количество товаров: <input type="text" id="kolvo"></p><p>Введите цену: <input type="text" id="price"></p><p>Введите путь к изображению: <input type="text" id="picture"></p>';
        echo json_encode($addProduct);
    }

    if ($checkDeleteProduct) {
        $query = "SELECT `id_product`, `product_name` FROM `product`";
        $result = mysqli_query($link,$query);
        if ($result) {        
            $deleteProduct = '<p>Выберите товар на удаление: <select id="deleteProductId"><option value="">Выберите товар</option>';
            while ($product = mysqli_fetch_assoc($result)) 
                $deleteProduct .= '<option value="'.$product['id_product'].'">'.$product['product_name'].'</option>';
            $deleteProduct .= '</select></p>';
            mysqli_free_result($result);
            echo json_encode($deleteProduct); 
        }
    }
    
    if ($checkSelectProduct) {
        $query = "SELECT `id_product`, `product_name` FROM `product`";
        $result = mysqli_query($link,$query);
        if ($result) {        
            $deleteProduct = '<p>Выберите товар для изменения: <select id="selectProductIdEnd"><option value="">Выберите товар</option>';
            while ($product = mysqli_fetch_assoc($result)) 
                $deleteProduct .= '<option value="'.$product['id_product'].'">'.$product['product_name'].'</option>';
            $deleteProduct .= '</select></p>';
            mysqli_free_result($result);
            echo json_encode($deleteProduct); 
        }
    }

    mysqli_close($link);
?>