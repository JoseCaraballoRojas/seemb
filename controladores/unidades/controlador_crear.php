<?php
include("../../modelos/Unidad.php");

$unidad=$_POST['unidad'];
$detalle=$_POST['detalle'];


if((empty($unidad)) || (empty($detalle))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_unidad= new Unidad();

		$mensaje=$crear_unidad->Crear($unidad,$detalle);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/unidades/vista_listar.php');
		</script>";		 
	} 



?>