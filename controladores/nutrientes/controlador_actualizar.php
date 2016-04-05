<?php
include("../../modelos/Nutriente.php");

$nutriente=$_POST['nutriente'];
$unidad=$_POST['unidad'];
$id_nutriente=$_POST['id_nutriente'];

if((empty($nutriente) || strlen($nutriente)<1) ||(empty($unidad)) || (empty($id_nutriente))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_nutriente= new Nutriente();

		$mensaje=$actualizar_nutriente->Actualizar($id_nutriente,$nutriente,$unidad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/nutrientes/vista_listar.php');
		</script>";		 
	} 



?>