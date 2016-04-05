<?php
//se incluye la clase producto
include_once("../../modelos/Producto.php");

$producto=$_POST['producto'];
$presentacion=$_POST['presentacion'];
$fecha_vencimiento=$_POST['fecha_vencimiento'];
$categoria=$_POST['categoria'];

if((empty($producto)) || (empty($presentacion))  || (empty($fecha_vencimiento)) || (empty($categoria)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_producto= new Producto();

		$mensaje=$crear_producto->Crear($producto,$presentacion,$fecha_vencimiento,$categoria);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";		 
	} 



?>