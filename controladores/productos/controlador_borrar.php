<?php
//se incluye la clase 
include("../../modelos/Producto.php");

$id_producto=$_GET['id_producto'];

if((empty($id_producto)) || (strlen($id_producto)<1) ){
	$msgError="el id  de la producto es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";	
}
else{

		$borrar_producto= new Producto();

		$mensaje=$borrar_producto->Borrar($id_producto);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_productos.php');
		</script>";		 
	} 



?>