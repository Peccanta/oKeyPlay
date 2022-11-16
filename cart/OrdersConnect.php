<?php
    include '../baza.php';
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $phone = $data['phone'];
    $email = $data['email'];
    $price = $data['price'];
    $login = $data['login'];

    $art = $data['art'];
   
    $string = json_encode( $art );

    $string = str_replace('{','',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(',',', ',$string);
    $string = str_replace(':',': ',$string);


    $query = "INSERT INTO `orders`(`login`,`Phone`,`Email`,`Price`,`All_art`,`date_order`)VALUES ('$login','$phone','$email','$price','$string',NOW())";
    $result = mysqli_query($link, $query);

    mysqli_close($link);

?>