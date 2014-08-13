<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update alumno set vNombre_Alu='".$Nombre."', vApellidoPaterno_Alu='".$Ape_Pat."', vApellidoMaterno_Alu='".$Ape_Mat."', vCorreo_Alu='".$Email."', vCorreoContacto_Alu='".$EmailT."' where iIDAlumno_Alu=".$IDAlumno);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>