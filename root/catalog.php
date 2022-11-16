<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>oKeyPlay</title>
</head>
<body onload="Items()">

    <div class="icons">
	    <div class="nav1">
    	    <a href="../index.php"><img src="../models/label.png" height="70" alt=""></a>
	    </div>
	    <div class="nav2">
	    	<a href="catalog.php" class="silka_catalog">ПЕРЕЙТИ В КАТАЛОГ</a>
	    </div>
	    <div class="nav3">
	    	<a href="../cart/cart.php"><img src=../models/backet.png  width="60" height="60" alt=""></a>
		    <a href="profileUser.php"><img src=../models/profile.png  width="60" height="60" alt=""></a> 
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
					<a href="catalog.php">КАТАЛОГ</a><br>
					<a href="../cart/cart.php">КОРЗИНА</a><br>
					<a href="profileUser.php">ПРОФИЛЬ</a><br>
    				<a href="../USERS/unauth.php">АВТОРИЗАЦИЯ</a><br>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <hr class="navhr">

    <div id="header">
        <div id="headerMain"></div>
        <div id="headerButton">
            <button type="button" id="buttonHeader">ПОИСК</button>
        </div>

    </div>
  
    <div id="main"></div> 

    <script src="../biblioteka/JQuery.js"></script>
    <script src="../script/main.js"></script>
</body>
</html>