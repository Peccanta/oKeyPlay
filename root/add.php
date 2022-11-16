<?php
    include '../baza.php';

    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    $value = $data['value'];
    $check = $data['check'];

    if ($value == '') {
        echo json_encode('При проверке данных произошла ошибка! Повторите попытку отправки!');
    }else{
        switch ($check) {
            case 1:
                $query = 'SELECT `id_genre` FROM `genre`';
                $result = mysqli_query($link,$query);
                if($result)
                {
                    $id = array();
                    while ($user = mysqli_fetch_assoc($result))
                    {
                        $id[] = $user;
                    }
                    $testGenre = end($id);
                    $aiGenre = $testGenre['id_genre'] + 1; 
                }
                mysqli_free_result($result);
                $query = 'INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES ("'.$aiGenre.'", "'.$value.'");';
            break;
            
            case 2:
                $query = 'SELECT `id_platform` FROM `platform`';
                $result = mysqli_query($link,$query);
                if($result)
                {
                    $id = array();
                    while ($user = mysqli_fetch_assoc($result))
                    {
                        $id[] = $user;
                    }
                    $testPlatform = end($id);
                    $aiPlatform = $testPlatform['id_platform'] + 1; 
                }
                mysqli_free_result($result);
                $query = 'INSERT INTO `platform` (`id_platform`, `platform_name`) VALUES ("'.$aiPlatform.'", "'.$value.'")';
            break;
            
        }
        $result = mysqli_query($link,$query);
        echo json_encode('Данные успешно добавлены!');
    }
    mysqli_close($link);
?>