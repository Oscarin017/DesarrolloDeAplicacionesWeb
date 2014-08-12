<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	$sConsulta="and (";
	$bConsulta=false;
	if($Nombre!="")
	{
		$bConsulta=true;
		$sConsulta.="(vNombre_Gru like '%".$Nombre."%')";
		if($NombreP!="")
		{
			$sConsulta.=" || ";
		}
	}
	if($NombreP!="")
	{
		$bConsulta=true;
		$sConsulta.="(vNombre_Pro like '%".$NombreP."%')";
	}

	if($bConsulta)
	{
		echo $mDatos->Seleccionar("Grupo join Profesor on (Grupo.iIDProfesor_Gru = Profesor.iIDProfesor_Pro)", "Where (bActivo_Gru=1)".$sConsulta.")");
	}
	else
	{
		echo $mDatos->Seleccionar("Grupo join Profesor on (Grupo.iIDProfesor_Gru = Profesor.iIDProfesor_Pro)", "Where (bActivo_Gru=1)");
	}

?>