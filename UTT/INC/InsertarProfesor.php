<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Insertar("insert into Profesor values ('', '".$Ape_Pat."', '".$Ape_Mat."', '".$Nombre."', '".$Email."', '".$Telefono."', '".$Usuario."', '".$Contrasena."', 1)");
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>