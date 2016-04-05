<?php
//se incluye la clase producto
include_once("../../modelos/Inventario.php");

$cantidad=$_POST['cantidad'];
$fecha_entrada=$_POST['fecha_entrada'];
$nivel_optimo=$_POST['nivel_optimo'];
$producto=$_POST['producto'];
$unidad=$_POST['unidad'];

if((empty($cantidad)) || (empty($fecha_entrada))  || (empty($nivel_optimo)) || (empty($producto)) || (empty($unidad)) ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_inventario= new Inventario();

		$mensaje=$crear_inventario->Crear($cantidad,$fecha_entrada,$nivel_optimo,$producto,$unidad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_inventarios.php');
		</script>";		 
	} 



?>