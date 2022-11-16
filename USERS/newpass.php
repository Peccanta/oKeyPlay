<?php
    session_start();
    include '../baza.php';

    $login = $_REQUEST['login'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];


    $query = "SELECT `login`, `password` FROM `users` WHERE `login` = '$login'";
    $result = mysqli_query($link, $query);
    

    if (mysqli_num_rows($result) > 0) {
        $query = "UPDATE `users` SET `password` = '$password' WHERE `login` = '$login'";
        $result = mysqli_query($link, $query);

        
        header('Location: vhod.php');

    } else {
        $_SESSION['message'] = 'Логин или почта не совпадают!';
        header('Location: changepass.php');
    }

?>

