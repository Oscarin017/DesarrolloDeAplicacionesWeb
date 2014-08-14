<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	$cAsistencia = "";

	if($Asistencia == "Presente")
	{
		$cAsistencia= "0";
	}
	else if($Asistencia == "Falta")
	{
		$cAsistencia= "1";
	}
	else
	{
		$cAsistencia="2";
	}

	$R=$mDatos->Modificar("insert into Asistencia values ('', '".$Fecha."', '".$cAsistencia."', '".$IDGrupoAlumno."')");
	$Re=array('Resultado' =>$R);

	echo json_encode($Re);
?>