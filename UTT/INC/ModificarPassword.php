<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update Profesor set vPassword_Pro='".$PasswordNueva."' where iIDProfesor_Pro=".$IDProfesor);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>