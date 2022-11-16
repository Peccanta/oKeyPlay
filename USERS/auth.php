<?php
    session_start();
    include '../baza.php';

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];

    $check_user = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' AND password ='$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] =
        [
            "login" => $user['login'],
            "surname" => $user['surname'],
            "middle_name" => $user['middle_name'],
            "name" => $user['name'],
            "date_of_birth" => $user['date_of_birth'],
            "image_prof" => $user['image_prof'],
            "gender" => $user['gender'],
            "email" => $user['email']
        ];
        if($login == 'admin'){
            header('Location: ../root/admin.php');

        }else{
        header('Location: ../index.php');
        }

    } else {
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: vhod.php');
    }
    ?>

