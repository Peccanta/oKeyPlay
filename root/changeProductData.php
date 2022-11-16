<?php
    include '../baza.php';

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $id = $data['id'];
    $name = $data['name'];
    $platform_name = $data['platform_name'];
    $genre_name = $data['genre_name'];
    $language = $data['language'];
    $release_date = $data['release_date'];
    $publisher = $data['publisher'];
    $kolvo = $data['kolvo'];
    $price = $data['price'];
    $picture = $data['picture'];

    if ($name == '' || $language == '' || $release_date == '' || $publisher == '' || $kolvo == '' || $price == '' || $picture == '') {
        echo json_encode('Поля не должны быть пустыми!');
    }else {
        $query = 'UPDATE `product` SET `product_name` = "'.$name.'", `language` = "'.$language.'", `release_date` = "'.$release_date.'", `publisher` = "'.$publisher.'", `kolvo` = "'.$kolvo.'", `price` = "'.$price.'", `picture` = "'.$picture.'" WHERE `product`.`id_product` = '.$id.'';
        $result = mysqli_query($link,$query);

        if ($platform_name != '') {
            $query = 'UPDATE `product` SET `id_platform` = "'.$platform_name.'" WHERE `product`.`id_product` = '.$id.'';
            $result = mysqli_query($link,$query);
        }

        if ($genre_name != '') {
            $query = 'UPDATE `product` SET `id_genre` = "'.$genre_name.'" WHERE `product`.`id_product` = '.$id.'';
            $result = mysqli_query($link,$query);
        }

        echo json_encode('Данные успешно изменены!');
    }

    mysqli_close($link);
?>