<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();
	$R=$mDatos->Modificar("update grupo set vNombre_Gru='".$Nombre."', iIDProfesor_Gru=".$Profesor." where iIDGrupo_Gru=".$IDGrupo);
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>