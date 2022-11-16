<?php
    include '../baza.php';

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $id = $data['id'];
    $type = $data['type'];

    switch ($type) {
        case 'change':
            $query = 'SELECT product.id_product, product.product_name, platform.platform_name, genre.genre_name, product.language, product.release_date, product.publisher, product.kolvo, product.price, product.picture FROM platform, product, genre WHERE product.id_product = '.$id.' AND platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre';
            $result = mysqli_query($link,$query);
            if ($result) {
                $table = '<table border = 1px><tr><td>Номер товара</td><td>Название товара</td><td>Платформа</td><td>Жанр</td><td>Язык</td><td>Дата выхода</td><td>Издатель</td><td>Количество</td><td>Цена</td><td>Изображение</td></tr>';    
                while ($product = mysqli_fetch_assoc($result))
                {
                    $name = $product['product_name'];
                    // $platform_name = $product['platform_name'];
                    // $genre_name = $product['genre_name'];
                    $language = $product['language'];
                    $release_date = $product['release_date'];
                    $publisher = $product['publisher'];
                    $kolvo = $product['kolvo'];
                    $price = $product['price'];
                    $picture = $product['picture'];
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

                    $table .= '</tr>';
                }   
                $table .= '</table>';

                $table .= '<br><p>Новое название товара: <input type="text" id="selectСhangeProductName" value="'.$name.'"></p><p>Выберите новую платформу: <select id="selectСhangePlatform"><option value="">Без изменений</option>';

                $query = 'SELECT * FROM `platform`';
                $result = mysqli_query($link,$query);
                if ($result) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        $table .= '<option value="'.$product['id_platform'].'">'.$product['platform_name'].'</option>';
                    } 
                    $table .= '</select></p><p>Выберите новый жанр: <select id="selectСhangeGenre"><option value="">Без изменений</option>';
                }
                mysqli_free_result($result);

                $query = 'SELECT * FROM `genre`';
                $result = mysqli_query($link,$query);
                if ($result) {
                    while ($product = mysqli_fetch_assoc($result)) {
                        $table .= '<option value="'.$product['id_genre'].'">'.$product['genre_name'].'</option>';
                    } 
                    $table .= '</select></p>';
                }
              

                $table .= '<p>Новый язык: <input type="text" id="selectСhangeLanguage" value="'.$language.'"></p>';
                $table .= '<p>Новая дата выхода: <input type="text" id="selectСhangeRelease_date" value="'.$release_date.'"></p>';
                $table .= '<p>Новый издатель: <input type="text" id="selectСhangePublisher" value="'.$publisher.'"></p>';
                $table .= '<p>Новое количество товара: <input type="text" id="selectСhangeKolvo" value="'.$kolvo.'"></p>';
                $table .= '<p>Новая цена товара: <input type="text" id="selectСhangePrice" value="'.$price.'"></p>';
                $table .= '<p>Новое изображение товара: <input type="text" id="selectСhangePicture" value="'.$picture.'"></p>';

                $table .= '<p><button type="button" id="buttonChangeProductsValuesSend" name="changeData" value="'.$id.'">Изменить данные</button></p>';

                echo json_encode($table);
                mysqli_free_result($result); 
            }  
        break;
        
        case 'delete':
            $query = 'DELETE FROM `product` WHERE `product`.`id_product` = '.$id;
            $result = mysqli_query($link,$query);

            $query = "SELECT product.id_product, product.product_name, platform.platform_name, genre.genre_name, product.language, product.release_date, product.publisher, product.kolvo, product.price, product.picture FROM platform, product, genre WHERE platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre ";
            $result = mysqli_query($link,$query);
            if ($result) {
                $table = '<table border = 1px><tr><td>Номер товара</td><td>Название товара</td><td>Платформа</td><td>Жанр</td><td>Язык</td><td>Дата выхода</td><td>Издатель</td><td>Количество</td><td>Цена</td><td>Изображение</td><td id="t1">✎</td><td id="t2">✖</td></tr>';    
                while ($product = mysqli_fetch_assoc($result))
                {
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

                echo json_encode($table);
                mysqli_free_result($result);
            }
        break;
    }
    
    mysqli_close($link);
?>