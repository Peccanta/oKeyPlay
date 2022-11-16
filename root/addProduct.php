<?php
    include '../baza.php';
    
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $name = $data['name'];
    $platform_name = $data['platform_name'];
    $genre_name = $data['genre_name'];
    $language = $data['language'];
    $release_date = $data['release_date'];
    $publisher = $data['publisher'];
    $kolvo = $data['kolvo'];
    $price = $data['price'];
    $picture = $data['picture'];

    if ($name == '' || $platform_name == '' || $genre_name == '' || $language == '' || $release_date == '' || $publisher == '' || $kolvo == '' || $price == '' || $picture == '') {
        echo json_encode('Ошибка! Проверьте правильность введённых данных и повторите отправку.');
    }else{
        $query = 'INSERT INTO `product` (`id_product`, `product_name`, `id_platform`, `id_genre`, `language`, `release_date`, `publisher`, `kolvo`, `price`, `picture`) VALUES (NULL, "'.$name.'", "'.$platform_name.'", "'.$genre_name.'", "'.$language.'", "'.$release_date.'", "'.$publisher.'", "'.$kolvo.'", "'.$price.'", "'.$picture.'")';
        $result = mysqli_query($link,$query);
        echo json_encode('Товар успешно добавлен!');
    }
    mysqli_close($link);
?>