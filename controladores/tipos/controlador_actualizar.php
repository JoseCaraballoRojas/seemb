<?php
include("../../modelos/Tipo.php");

$tipo=$_POST['tipo'];
$id_tipo=$_POST['id_tipo'];

if((empty($tipo) || strlen($tipo)<3) || (empty($id_tipo))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_tipo= new tipo();

		$mensaje=$actualizar_tipo->Actualizar($id_tipo,$tipo);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_tipos.php');
		</script>";		 
	} 



?>