<?php

	header('Content-type: application/json');

 	include_once("Modelo.php");

 	extract($_POST);

	$mDatos =new Modelo(); 
	$mDatos->conectar();

	$sConsulta="and (";
	$bConsulta=false;
	if($IDProfesor!="")
	{
		$bConsulta=true;
		$sConsulta.="(iIDProfesor_Pro=".$IDProfesor.")";
		if($Nombre!="" || $Ape_Pat!="")
		{
			$sConsulta.=" || ";
		}
	}
	if($Nombre!="")
	{
		$bConsulta=true;
		$sConsulta.="(vNombre_Pro like '%".$Nombre."%')";
		if($Ape_Pat!="")
		{
			$sConsulta.=" || ";
		}
	}
	if($Ape_Pat!="")
	{
		$bConsulta=true;
		$sConsulta.="(vApellidoPaterno_Pro like '%".$Ape_Pat."%')";
	}

	if($bConsulta)
	{
		echo $mDatos->Seleccionar("Profesor", "Where (bActivo_Pro=1)".$sConsulta.")");
	}
	else
	{
		echo $mDatos->Seleccionar("Profesor", "Where (bActivo_Pro=1)");
	}

?>