<?php
    session_start();    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/root.css">
    <title>oKeyPlay</title>
</head>
<body>

    <div class="icons">
	<div class="nav1">
    	<a href="admin.php"><img src="../models/label.png" height="70" alt=""></a>
	</div>
	<div class="nav2">
    <p>ПАНЕЛЬ УПРАВЛЕНИЯ ДЛЯ АДМИНИСТРАТОРА</p>
	</div>
	<div class="nav3">
    	<a href="../USERS/unauth.php"><img src="../models/exit.png" width="60" height="60" alt=""></a>
    </div>
    </div>
    <hr class="navhr">


<div class="container"><!--container -->

    <h3 class="menu">СПИСОК ТОВАРОВ</h3>
	<div id="product" class="move">
        <div id="poiskRoot"></div>
        <div id="allProductsAdmin"></div>
    </div>
    <hr class="between">

    <h3 class="menu">ДОБАВИТЬ НОВЫЙ ТОВАР</h3>
	<div id="addProduct" class="move">
        <div id="addProductOtvet"></div>
        <div id="addProductValue"></div>
        <div id="addProductButton">
            <p><button type="button" id="addProductSend">Добавить</button></p>
        </div>
    </div>
    <hr class="between">

    <h3 class="menu">ДОБАВИТЬ НОВУЮ ПЛАТФОРМУ</h3>
	<div id="addPlatform" class="move">
        Введите новую платформу: <input type="text" id="addPlatformValue">
        <div id="addPlatformButton">
            <p><button type="button" id="addPlatformSend">Добавить</button></p>
        </div>
    </div>
    <hr class="between">

    <h3 class="menu">ДОБАВИТЬ НОВЫЙ ЖАНР</h3>
	<div id="addGenre" class="move">
        Введите новый жанр: <input type="text" id="addGenreValue">
        <div id="addGenreButton">
            <p><button type="button" id="addGenreSend">Добавить</button></p>
        </div>
    </div>
    <hr class="between">
   
</div> <!--container -->

<script src="../biblioteka/JQuery.js"></script>
<script src="script.js"></script>

</body>
</html>