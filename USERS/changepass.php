<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: ../index.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>oKeyPlay</title>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form action="newpass.php" method="POST" class="login100-form validate-form">
                <br>
                <span class="login100-form-title for_media_h">
						Восстановление пароля
					</span>
                    <br>

                    <div class="text-center p-t-0 for_media_h">
						<a class="txt" style="font-size: 30px;">
							Введите логин
						</a>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="login" placeholder="Логин" required name="login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>
                    

                    <div class="text-center p-t-0 for_media_h">
						<a class="txt" style="font-size: 30px;">
							Введите почту
						</a>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="text" name="email" placeholder="Почта" required name="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
                    <div class="text-center p-t-0 for_media_h">
						<a class="txt" style="font-size: 30px;">
							Введите новый пароль
						</a>
					</div>

                    <div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Пароль" required name="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Подтвердить
						</button>
					</div>

					<?php
           				if ($_SESSION['message']) {
                			echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            			}
            			unset($_SESSION['message']);
        			?>

					<div class="text-center p-t-80">
						<a class="txt2" href = "registration.php">
							Регистрация
							
						</a>
                    </div>
					<div class="text-center p-t-10">
						<a class="txt2" href = "../index.php">
							Вернуться в каталог
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	
	<script src="../js/main.js"></script>

</body>

</body>
</html>