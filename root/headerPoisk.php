<?php
    include '../baza.php';
    $check = $_GET['check'];
   
    $query = "SELECT `genre_name` FROM `genre`";
    $result = mysqli_query($link,$query);
    if ($result) {
        $header = '<p><select id="genrePoisk"><option value="">Жанр</option>';
        while ($genre_name = mysqli_fetch_assoc($result)) 
            $header .= '<option value="'.$genre_name['genre_name'].'">'.$genre_name['genre_name'].'</option>';
        $header .= '</select> ';

        mysqli_free_result($result); 
    }

    $query = "SELECT `platform_name` FROM `platform`";
    $result = mysqli_query($link,$query);
    if ($result) {
        $header .= '<select id="platformPoisk"><option value="">Платформа</option>';
        while ($platform_name = mysqli_fetch_assoc($result)) 
            $header .= '<option value="'.$platform_name['platform_name'].'">'.$platform_name['platform_name'].'</option>';
        $header .= '</select> ';

        mysqli_free_result($result);
    }

    $header .= '<input type="text" id="poiskPoisk" placeholder="Поиск по товарам"> ';
  
    $header .= '</select> <button type="button" name="sendData">Сортировка</button></p>';
    echo json_encode($header);
    mysqli_close($link);
?>