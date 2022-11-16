<?php
    include '../baza.php';
    
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $genre_name = $data['gen'];
    $platform_name = $data['plat'];
    $poisk = $data['poi'];
   

    $query = 'SELECT product.id_product, platform.platform_name, genre.genre_name, product.picture, product.product_name, product.language, product.release_date, product.publisher, product.price, product.kolvo FROM product, platform, genre WHERE product.product_name LIKE "%'.$poisk.'%" AND platform.platform_name LIKE "%'.$platform_name.'%" AND genre.genre_name LIKE "%'.$genre_name.'%" AND platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre';
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
           
        if ($table == '<table border = 1px><tr><td>Номер товара</td><td>Название товара</td><td>Платформа</td><td>Жанр</td><td>Язык</td><td>Дата выхода</td><td>Издатель</td><td>Количество</td><td>Цена</td><td>Изображение</td><td id="t1">✎</td><td id="t2">✖</td></tr></table>') 
            $table = '<p id="pusto">Совпадений не найдено!</p>';
        
    }

    echo json_encode($table);
    mysqli_close($link);
?>