<?php
    include '../baza.php';
    $check = $_GET['check'];
    
    $query = "SELECT `picture`, `product_name`, `price`, `id_product` FROM `product`";
    $result = mysqli_query($link,$query);

    if ($result) {
        $main;
        while ($product = mysqli_fetch_assoc($result)) 
        $main .= '<div id="product"><p><img src="'.$product['picture'].'"></p><p>'.$product['product_name'].'</p><p>'.$product['price'].' руб.</p>'.
        '<button class="buy" data-title="'.$product['product_name'].'" data-img="'.$product['picture'].'" data-price="'.$product['price'].'" data-id="'.$product['id_product'].'">В КОРЗИНУ</button></div>';
    
        mysqli_free_result($result);
        echo json_encode($main);
        mysqli_close($link);
    }
?>