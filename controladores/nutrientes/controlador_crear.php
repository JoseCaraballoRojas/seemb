<?php
include("../../modelos/Nutriente.php");

$nutriente=$_POST['nutriente'];
$unidad=$_POST['unidad'];


if((empty($nutriente)) || (empty($unidad))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_nutriente= new Nutriente();

		$mensaje=$crear_nutriente->Crear($nutriente,$unidad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/nutrientes/vista_listar.php');
		</script>";		 
	} 



?>