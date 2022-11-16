<?php
    session_start();

    include '../baza.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $middle_name = $_POST['middle_name'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
 

    $query = "SELECT * FROM users";
    $result = mysqli_query($link, $query);
    $users = array();
    $rows = mysqli_num_rows($result);

    for ($i=0; $i < $rows; ++$i) { 
        $user = mysqli_fetch_assoc($result);
        $users[] = $user;
    }

    $check = false;

    foreach($users as $user){
        if ($user['login'] == $login) {
            $check = true;
        }
    }
    
    if ($check) {
        $_SESSION['message'] = 'Такой пользователь уже существует!';
        header('Location: registration.php');


    } else if(strlen($login)<6 || strlen($login)>25 || empty($login)){
        $_SESSION['message'] = 'Логин должен содержать от 6 до 25 символов!';
        header('Location: registration.php');

    } else if(strlen($password)<6 || strlen($password)>25 || empty($password)){
        $_SESSION['message'] = 'Пароль должен содержать от 6 до 25 символов!';
        header('Location: registration.php');

    } else {
        $path = '../uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '' . $path)) {
            $path = '../uploads/1619280222user-icon.jpg';
        }

        mysqli_query($link, "INSERT INTO `users` (`login`,`password`,`surname`,`name`,`middle_name`,`gender`,`date_of_birth`,`image_prof`)
        VALUES ('$login','$password', '$surname', '$name', '$middle_name', '$gender', '$date_of_birth','$path')");
        header('Location: vhod.php');
    }

?>