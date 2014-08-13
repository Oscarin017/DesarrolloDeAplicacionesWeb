<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update profesor set vNombre_Pro='".$Nombre."', vApellidoPaterno_Pro='".$Ape_Pat."', vApellidoMaterno_Pro='".$Ape_Mat."', vCorreo_Pro='".$Email."', cTelefono_Pro='".$Telefono."' where iIDProfesor_Pro=".$IDProfesor);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>