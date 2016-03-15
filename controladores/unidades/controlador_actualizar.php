<?php
include("../../modelos/Unidad.php");

$unidad=$_POST['unidad'];
$detalle=$_POST['detalle'];
$id_unidad=$_POST['id_unidad'];

if((empty($unidad) || strlen($unidad)<1) ||(empty($detalle)) || (empty($id_unidad))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_unidad= new Unidad();

		$mensaje=$actualizar_unidad->Actualizar($id_unidad,$unidad,$detalle);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/unidades/vista_listar.php');
		</script>";		 
	} 



?>