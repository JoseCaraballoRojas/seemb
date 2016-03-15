<?php
include("../../modelos/Categoria.php");

$categoria=$_POST['categoria'];
$detalle=$_POST['detalle'];
$id_categoria=$_POST['id_categoria'];

if((empty($categoria) || strlen($categoria)<1) ||(empty($detalle)) || (empty($id_categoria))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_categoria= new Categoria();

		$mensaje=$actualizar_categoria->Actualizar($id_categoria,$categoria,$detalle);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_categorias.php');
		</script>";		 
	} 



?>