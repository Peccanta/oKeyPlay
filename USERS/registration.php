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
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../biblioteka/jquery.maskedinput.js"></script>
	<script src="../biblioteka/inputmask.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script src="../js/main.js"></script>

    <title>oKeyPlay</title>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form action="regcheck.php" method="POST" class="login100-form validate-form" enctype="multipart/form-data">
				
					<span class="login100-form-title">
						Регистрация
					</span>
					<div class="wrap-input100">
						<input class="input100" type="text" name="login" placeholder="Логин" required name="login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							
						</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Пароль" required name="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="surname" placeholder="Фамилия" required name="surname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="name" placeholder="Имя" required name="name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="middle_name" placeholder="Отчество" required name="middle_name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        
						</span>
                    </div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="gender" placeholder="Пол" required name="gender">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        
						</span>
                    </div>
                    <div class="wrap-input100">
						<input class="input100" id="date_of_birth" type="text" name="date_of_birth" placeholder="Дата рождения" required name="date_of_birth">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <script>
 						$('#date_of_birth').mask('99.99.9999');
 						</script>
						</span>
                    </div>

					<div class="text-center p-t-0">
						<a class="txt2">
							Выберите фотографию профиля
						</a>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="file" name="avatar" style="color:#989898; padding-top:10px; background-color:white" placeholder="Выберите фото">
						<span class="focus-input100"></span>
						
                    </div>
					<div class="container-login-form-btn">
						<button class="login100-form-btn">
							Зарегистрироваться
						</button>
					</div>

					<?php
           				if ($_SESSION['message']) {
                			echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            			}
            			unset($_SESSION['message']);
        			?>

					<div class="text-center p-t-80">
						<a class="txt2" href = "vhod.php">
							Авторизация
							
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
</body>
</html>
