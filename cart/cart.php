<?php
session_start();
session_start();
if (!$_SESSION['user']) {
    header('Location: ../USERS/vhod.php');
}else if($_SESSION['user']['login'] == 'admin')
{
    header('Location: ../root/admin.php');
}
    include '../baza.php';
    $query="SELECT `product_name`,`price`,`picture`,`id_product` FROM `product`";
    $result = mysqli_query($link, $query);

    while ($row1 = mysqli_fetch_object($result)) {
        $response[] = 
        [
            $row1->product_name,
            $row1->id_product,

        ];

    };

    $result = mysqli_query($link, $query);

    while ($row1 = mysqli_fetch_object($result)) {
        $response1[$row1->product_name] = 
        [
            'id_product'=>$row1->id_product,
            'product_name'=>$row1->product_name,
            'price'=>$row1->price,
            'picture'=>$row1->picture
        ];
    }

    file_put_contents("chart_data.json", json_encode($response1, JSON_UNESCAPED_UNICODE));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleCart.css">
    <link rel="stylesheet" href="../css/modal.css">

    <title>oKeyPlay</title>
</head>
<body>

    <div class="icons">
	<div class="nav1">
    	<a href="../index.php"><img src="../models/label.png" height="70" alt=""></a>
	</div>
	<div class="nav2">
		<a href="../root/catalog.php" class="silka_catalog">ПЕРЕЙТИ В КАТАЛОГ</a>
	</div>
	<div class="nav3">
        <a href="cart.php"><img src=../models/backet.png  width="60" height="60" alt=""></a> 
		<a href="../root/profileUser.php"><img src=../models/profile.png  width="60" height="60" alt=""></a>
    	<a href="../USERS/unauth.php"><img src="../models/exit.png" width="60" height="60" alt=""></a>
    </div>
    <div class="menu">
            <input id="toggle" type="checkbox"></input>
            <label for="toggle" class="hamburger">
        	<div class="top-bun"></div>
        	<div class="meat"></div>
        	<div class="bottom-bun"></div>
        	</label>
            <div class="nav">
                <div class="nav-wrapper">
                    <nav class="hidden_nav">
					<a href="../index.php">ГЛАВНАЯ</a><br>
					<a href="../root/catalog.php">КАТАЛОГ</a><br>
					<a href="cart.php">КОРЗИНА</a><br>
					<a href="../root/profileUser.php">ПРОФИЛЬ</a><br>
    				<a href="../USERS/unauth.php">АВТОРИЗАЦИЯ</a><br>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <hr class="navhr">

    <div class="zakaz">

    <div class="summa">
        <p class="mini_cart_summ"></p>
        <button id="delete_goods" class="open-button">ОЧИСТИТЬ КОРЗИНУ</button><br><br><button id="open-button" class="open-button" >ОФОРМИТЬ ЗАКАЗ</button>
    </div>

        <div id="main"></div>
    <br>
    
        <div class="modal" id="modal" aria-hidden="true" aria-labelledby="modalTitle" aria-describedby="modalDescription" role="dialog">
            
            <button class="close-button" id="close-button" title="Закрыть">✖</button>
            <div class="black"></div>
            <p class="ofor"> ОФОРМЛЕНИЕ ЗАКАЗА</p>
            <div class="modal-guts" role="document">
                <form method="POST" id="form_users">
                    &nbsp;&nbsp;&nbsp; Введите Почту  <input type="text" id="input_modal" placeholder="example@test.ru" name="email" required><br>
                    <br>&nbsp;Введите Телефон  <input type="text" id="input_modal" placeholder="+7(777)777-77-77" name="phone" required><br>
                    <input type="text" class="displaynonelogin" id="input_modal" placeholder="<?= $_SESSION['user']['login'] ?>" name="login" value="<?= $_SESSION['user']['login']?>" disabled><br>

                    <br><br><p class="mini_cart_summ"></p>
                    <input type="submit" class="button_submit_cart" name="submit_class_button"><br>
                        
                </form>
            </div>
        </div>
                

    </div>

    <script src="../biblioteka/JQuery.js"></script>
    <script src="../script/main.js"></script>
    <script src="cart.js"></script>

</body>
</html>