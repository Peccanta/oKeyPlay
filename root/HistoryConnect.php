<?php
    include '../baza.php';

    $query = "SELECT users.login, orders.login, orders.All_art,orders.date_order FROM `users`,`orders` WHERE `users`.`login` = `orders`.`login` AND `users`.`login` = ".$_GET['id'];
    $result = mysqli_query($link,$query);
        if ($result) {
        $main = '<table class="table_user_history" ><tr> <td>Товары</td> <td>Дата заказа</td> </tr>';

        while ($header = mysqli_fetch_assoc($result))
        {
            $main .= '<tr>';
            $main .= '<th>'.$header['All_art'].'</th>';
            $main .= '<th>'.$header['date_order'].'</th>';

            $main .= '</tr>';
        }
        $main .= '</table>';

        mysqli_free_result($result);
        echo json_encode($main);
        mysqli_close($link);
    }

?>