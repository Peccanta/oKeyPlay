<?php
    include '../baza.php';
    $query="SELECT `product_name`,`price`,`picture`,`id_product` FROM `product`";
    $result = mysqli_query($link, $query);

    while ($row1 = mysqli_fetch_object($result)) {
        $response[] = 
        [
            $row1->product_name,
        ];

    };

    $result = mysqli_query($link, $query);

    while ($row1 = mysqli_fetch_object($result)) {
        $response1[$row1->id_product] = 
        [
            'product_name'=>$row1->product_name,
            'price'=>$row1->price,
            'picture'=>$row1->picture
        ];
    }

    file_put_contents("chart_data.json", json_encode($response1, JSON_UNESCAPED_UNICODE));
?>
