
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>oKeyPlay</title>
    <link rel="icon" type="image/png" href="favicon.png">

        <link rel="stylesheet" type="text/css" href="css/slider/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/slider/style.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/slider/jmpress.min.js"></script>
		<script type="text/javascript" src="js/slider/jquery.jmslideshow.js"></script>
		<script type="text/javascript" src="js/slider/modernizr.custom.48780.js"></script>
		<noscript>
			<style>
			.step {
				width: 100%;
				position: relative;
			}
			.step:not(.active) {
				opacity: 1;
				filter: alpha(opacity=99);
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=99)";
			}
			.step:not(.active) a.jms-link{
				opacity: 1;
				margin-top: 40px;
			}
			</style>
		</noscript>
</head>

<body>
    <div class="icons">
		<div class="nav1">
    		<a href="index.php"><img src="models/label.png" height="70" alt=""></a>
		</div>
		<div class="nav2">
			<a href="../root/catalog.php" class="silka_catalog">ПЕРЕЙТИ В КАТАЛОГ</a>
		</div>
		<div class="nav3">
			<a href="cart/cart.php"><img src=models/backet.png  width="60" height="60" alt=""></a> 
			<a href="root/profileUser.php"><img src=models/profile.png  width="60" height="60" alt=""></a> 
    		<a href="USERS/unauth.php"><img src="models/exit.png" width="60" height="60" alt=""></a>
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
					<a href="index.php">ГЛАВНАЯ</a><br>
					<a href="root/catalog.php">КАТАЛОГ</a><br>
					<a href="cart/cart.php">КОРЗИНА</a><br>
					<a href="root/profileUser.php">ПРОФИЛЬ</a><br>
    				<a href="USERS/unauth.php">АВТОРИЗАЦИЯ</a><br>
                    </nav>
                </div>
            </div>
        </div>
	</div>

	<hr class="navhr">

    	<div class="container">
			<section id="jms-slideshow" class="jms-slideshow">

				<div class="step" data-color="color-3" >
					<div class="jms-content">
						<h3>ORIGIN</h3>
						<a class="jms-link" href="root/catalog.php">В КАТАЛОГ</a>
					</div>
					<img src="images/2.png" />
				</div>
			
				<div class="step" data-color="color-2">
					<div class="jms-content">
						<h3>STEAM</h3>
						<a class="jms-link" href="root/catalog.php">В КАТАЛОГ</a>
					</div>
					<img src="images/1.png" />
				</div>

				<div class="step" data-color="color-4" >
					<div class="jms-content">
						<h3>EG STORE</h3>
						<a class="jms-link" href="root/catalog.php">В КАТАЛОГ</a>
					</div>
					<img src="images/3.png" />
				</div>

				<div class="step" data-color="color-5" >
					<div class="jms-content">
						<h3>UPLAY</h3>
						<a class="jms-link" href="root/catalog.php">В КАТАЛОГ</a>
					</div>
					<img src="images/4.png" />
				</div>

				<div class="step" data-color="color-1" >
					<div class="jms-content">
						<h3>BATTLE.NET</h3>
						<a class="jms-link" href="root/catalog.php">В КАТАЛОГ</a>
					</div>
					<img src="images/5.png" />
				</div>

			</section>
            
    	</div>

		<div class="about_project">
		<p>ДОБРО ПОЖАЛОВАТЬ<br>В МАГАЗИН КОМПЬЮТЕРНЫХ ИГР<br>«OKEYPLAY»</p>
		<p>ИГРОВЫЕ ПЛАТФОРМЫ</p>
			<a href="root/catalog.php"><img src="images/11.png"></a>
			<a href="root/catalog.php"><img src="images/22.png"></a>
			<a href="root/catalog.php"><img src="images/33.png"></a>
			<a href="root/catalog.php"><img src="images/44.png"></a>
		</div>

		<div class="social">
			<p class="social-text">СЛЕДИТЕ ЗА НОВОСТЯМИ ИГРОВОЙ ИНДУСТРИИ<br>В НАШИХ СОЦИАЛЬНЫХ СЕТЯХ!</p>
			<a href="https://vk.com"><img src="images/6.png" alt="VK"></a>
			<a href="https://www.youtube.com"><img src="images/7.png" alt="YOUTUBE"></a>
			<a href="https://www.instagram.com/"><img src="images/8.png" alt="INST"></a>
			<a href="https://telegram.org/"><img src="images/9.png" alt="TELEGA"></a>
		</div>

        <script type="text/javascript">
			$(function() {
				
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				$( '#jms-slideshow' ).jmslideshow( $.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: false
				}));
				
			});
		</script>

    <script src="script/main.js"></script>
</body>
</html>