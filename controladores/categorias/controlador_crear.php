<?php
include_once("../../modelos/Categoria.php");

$categoria=ucfirst($_POST['categoria']);
$detalle=ucfirst($_POST['detalle']);


if((empty($categoria)) || (empty($detalle))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_categoria= new Categoria();

		$mensaje=$crear_categoria->Crear($categoria,$detalle);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_categorias.php');
		</script>";		 
	} 



?>