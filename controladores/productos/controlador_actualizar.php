<?php
//se incluye la clase producto
include_once("../../modelos/Producto.php");

$id_producto=$_POST['id_producto'];
$producto=$_POST['producto'];
$presentacion=$_POST['presentacion'];
$categoria=$_POST['categoria'];


if((empty($producto)) ||(empty($presentacion)) ||(empty($id_producto)) ||(empty($categoria)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_producto= new Producto();

		$mensaje=$actualizar_producto->Actualizar($id_producto,$producto,$presentacion,$categoria);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";		 
	} 



?>