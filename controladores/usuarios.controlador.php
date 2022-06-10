<?php

class ControladorUsuarios {

	static public function ctrIngresoUsuario() {

		if (isset($_POST["ingUsuario"])) {

			if (empty($_POST['ingUsuario'])) {	
				echo '<br><div class="alert alert-danger">USUARIO vacio!</div>';
			} else if (empty($_POST['ingPassword'])) { 
				echo '<br><div class="alert alert-danger">PASSWORD vacio!</div>';
			} else if (!empty($_POST['ingUsuario']) && !empty($_POST['ingPassword'])) { 
				$usuario = $_POST['ingUsuario'];
				//var_dump(ControladorUsuarios::Users($usuario));
				$usuarios = ControladorUsuarios::Users($usuario);

				foreach ($usuarios as $key => $value) {

					$id = $usuarios[$key]['id'];
					$username = $usuarios[$key]['username'];
					$email = $usuarios[$key]['email'];
					$clave = $usuarios[$key]['clave'];

					//var_dump($username);
					if ($_POST['ingUsuario'] == $username && $_POST['ingPassword'] == $clave) {

						$_SESSION["usuario"] = $username;

						echo '<script>window.location = "vistas/modulos/inicio.php";</script>';

					} else {
						echo '<div class="alert alert-danger">USUARIO no existe!</div>';
					}
				}

			}

		} 
	}

	static public function Users($usuario) {
		$usuarios = file_get_contents('https://PrismaTest.prismadigdev.repl.co/users');
		$usuarios = json_decode($usuarios, true);
		return $usuarios;
	}

}