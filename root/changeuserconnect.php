<?php

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $checkpasswordchange = $data['checkpasswordchange'];
    $checkloginchange = $data['checkloginchange'];
  
    include '../baza.php';
    if($checkpasswordchange)
    {
        $login = $data['login'];
        $passnew = $data['newpass'];
        $passold = $data['oldpass'];
                

        $query = "SELECT `login`,`password` FROM `users` WHERE `login`='$login' AND `password` = '$passold'";
        $result = mysqli_query($link,$query);

            if(mysqli_num_rows($result) > 0)
            {
                $query = "UPDATE `users` SET `password`='$passnew' WHERE login='$login' AND `password` = '$passold'";
                $main .= '<p>Пароль успешно изменён!</p>';
                $result = mysqli_query($link,$query);
                echo json_encode($main);
            } else{
                $main .= '<p>Пароли не совпадают!</p>';
                echo json_encode($main);
            };

    };

    if($checkloginchange)
    {
        $loginold = $data['oldlogin'];
        $loginnew = $data['newlogin'];
        $password = $data['pass'];

        $query = "SELECT `login`,`password` FROM `users` WHERE `login`='$loginold' AND `password` = '$password'";
        $query1 = "SELECT `login` FROM `orders` WHERE `login`='$loginold' AND `password` = '$password'";
        $result = mysqli_query($link,$query);
        $result1 = mysqli_query($link,$query1);

        if(mysqli_num_rows($result) > 0)
        {
            $query = "UPDATE `users` SET `login`='$loginnew' WHERE `login`='$loginold'";
            $query1 = "UPDATE `orders` SET `login`='$loginnew' WHERE `login` = '$loginold'";
            $main .= '<p>Логин успешно изменён!</p>';
            $result1 = mysqli_query($link,$query1);
            $result = mysqli_query($link,$query);
            echo json_encode($main);
        } else{
            $main .= '<p>Неверный пароль!</p>';
            echo json_encode($main);
        }

    };




?>