<?php
//se incluye la clase producto
include_once("../../modelos/Producto.php");

$producto=ucfirst($_POST['producto']);
$presentacion=ucfirst($_POST['presentacion']);
$categoria=$_POST['categoria'];

if((empty($producto)) || (empty($presentacion))  || (empty($categoria)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_producto= new Producto();

		$mensaje=$crear_producto->Crear($producto,$presentacion,$categoria);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";		 
	} 



?>