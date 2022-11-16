<?php
    include '../baza.php';
    $check = $_GET['check'];
    
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $genre_name = $data['gen'];
    $platform_name = $data['plat'];
    $poisk = $data['poi'];
    

    $query = 'SELECT product.picture, product.product_name, product.price, id_product FROM product, platform, genre WHERE product.product_name LIKE "%'.$poisk.'%" AND platform.platform_name LIKE "%'.$platform_name.'%" AND genre.genre_name LIKE "%'.$genre_name.'%" AND platform.id_platform=product.id_platform AND genre.id_genre=product.id_genre';
    $result = mysqli_query($link,$query);
    if ($result) {
        $headers = array();   
        while ($header = mysqli_fetch_assoc($result))
        $main .= '<div id="product"><p><img src="'.$header['picture'].'"></p><p>'.$header['product_name'].'</p><p>'.$header['price'].' руб.</p>'.
        '<button class="buy" data-title="'.$header['product_name'].'" data-img="'.$header['picture'].'" data-price="'.$header['price'].'" data-id="'.$header['id_product'].'">В КОРЗИНУ</button></div>';           
        if ($main == '') {
            $main = '<p id="pusto"><img src="../models/krest.png" alt="СОВПАДЕНИЙ НЕ ОБНАРУЖЕНО!"></p>';
        }
        mysqli_free_result($result);
    }

    echo json_encode($main);
    mysqli_close($link);
?>