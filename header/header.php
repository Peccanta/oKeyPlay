<?php
    include '../baza.php';
    $check = $_GET['check'];
  
    $query = "SELECT `genre_name` FROM `genre`";
    $result = mysqli_query($link,$query);
    if ($result) {
        $header = '<select id="genre_name"><option value="">ЖАНР</option>';
        while ($genre_name = mysqli_fetch_assoc($result)) 
            $header .= '<option value="'.$genre_name['genre_name'].'">'.$genre_name['genre_name'].'</option>';
        $header .= '</select> ';

        mysqli_free_result($result); 
    }

    $query = "SELECT `platform_name` FROM `platform`";
    $result = mysqli_query($link,$query);
    if ($result) {
        $header .= '<select id="platform_name"><option value="">ПЛАТФОРМА</option>';
        while ($platform_name = mysqli_fetch_assoc($result)) 
            $header .= '<option value="'.$platform_name['platform_name'].'">'.$platform_name['platform_name'].'</option>';
        $header .= '</select> ';

        mysqli_free_result($result);
    }
   
    $header .= '<p><input type="text" id="poisk" placeholder="ВВЕДИТЕ НАЗВАНИЕ ТОВАРА"> </p>';
    
 
    echo json_encode($header);
    mysqli_close($link);
?>