<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php Controlador::ctrTittle(); ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="icon" href="vistas/img/prisma.png" />
	<style>
	.figure{
		margin-top: 100px;
	}

	.btn{
		background-color: black;
		color:white;
		border-style:none;
		border-radius:0px;
	}

	.btn:hover{
		color:white;
	}
</style>
</head>
<body>
	<div class="container-fluid">

		<div class="container col-3">

			<figure class="figure">
				<img src="vistas/img/prisma.png" class="figure-img img-fluid rounded" alt="">
			</figure>

			<?php

			if (isset($_SESSION["iniciarSession"]) && $_SESSION["iniciarSession"] == "OK") {
				echo 'INICIO';	
			} else {

				echo '<form method="post" class="form" id="loginForm">

					<div class="mb-3">
						<label for="User" class="form-label">User</label>
						<input type="text" class="form-control input-login" name="ingUsuario" id="ingUsuario" />
					</div>

					<div class="mb-3">
						<label for="Password" class="form-label">Password</label>
						<input type="password" class="form-control input-login" name="ingPassword" />
					</div>

					<div class="mt-3 mb-1">
						<button type="submit" class="btn btn-primary ingresar">Login</button>
					</div>';

					$login = new ControladorUsuarios();
					$login->ctrIngresoUsuario();

				echo '</form>';
			}

			?>

		</div>
	</div>

</body>
</html>