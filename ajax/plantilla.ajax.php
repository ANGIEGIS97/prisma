<?php

require "../controladores/plantilla.controlador.php";

if (isset($_POST['usuario'])) {
	//var_dump(Controlador::Bills($_POST['usuario']));
	echo json_encode(Controlador::Bills($_POST['usuario']));
}

if (isset($_POST['registro'])) {

	$usuario = $_POST['registro'];
	$tipo = 1;
	$descripcion = $_POST['descripcion'];
	$valor = $_POST['valor'];

	$bill = array('type'=>$tipo, 'value'=>$valor, 'observation'=>$descripcion);

	Controlador::Bill($usuario, $bill);

}