<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: ../USERS/vhod.php');
    }else if($_SESSION['user']['login'] == 'admin')
    {
        header('Location: ../root/admin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
    
    <div class="profile_user">
        <div class ="left">
            <img src="<?= $_SESSION['user']['image_prof'] ?>" alt="">
            <p class = "info1">Логин:</p> <p class="info2"><?= $_SESSION['user']['login']?></p>
            <p class = "info1">Фамилия:</p> <p class="info2"><?= $_SESSION['user']['surname']?></p>
            <p class = "info1">Имя:</p> <p class="info2"><?= $_SESSION['user']['name']?></p>
            <p class = "info1">Отчество:</p> <p class="info2"><?= $_SESSION['user']['middle_name']?></p>
            <p class = "info1">Пол:</p> <p class="info2"><?= $_SESSION['user']['gender']?></p>
        </div>
        
        <div class ="right">
            <button class="btn_link_profile" id="btn_profile_history" onclick="ProfileInfo(`<?php echo $_SESSION['user']['login']?>`)">Изменить данные</button>
            <button class="btn_link_profile" id="btn_profile_history" onclick="ProfileHistory(`<?php echo $_SESSION['user']['login']?>`)">История заказов</button>
            <hr>
           
            <div class="box_profile_info">
                <div class="profile_text">
                
                    <p><br><br><br>ТЕХНИЧЕСКАЯ ПОДДЕРЖКА</p>
                    <p>Телефон:</p>
                    <p>+7(977)736-03-32</p>
                    <p>Электронная почта:</p>
                    <p>darkreek@mail.ru</p>

                </div>
            </div>

        </div>
    </div>
    


    <script src="../biblioteka/JQuery.js"></script>
    <script src="../script/main.js"></script>
    
</body>
</html>