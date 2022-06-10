<?php

class Controlador {

	static public function ctrPlantilla() {
		include_once 'vistas/plantilla.php';
	}

	static public function ctrTittle() {
		echo 'PRISMA | HOMEPAGE';
	}

	static public function Bills($usuario) {
		$bills = file_get_contents('https://PrismaTest.prismadigdev.repl.co/users/'.$usuario.'/bills');
		$bills = json_decode($bills, true);
		return $bills;
	}

	static public function Bill($usuario, $bill) {
		$bill = file_get_contents('https://PrismaTest.prismadigdev.repl.co/users/'.$usuario.$bill);
		$bill = json_decode($bill, true);
		return $bill;
	}
}