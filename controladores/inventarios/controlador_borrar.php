<?php
//se incluye la clase inventario
include_once("../../modelos/Inventario.php");

$id_inventario=$_GET['id_inventario'];

if((empty($id_inventario)) || (strlen($id_inventario)<1) ){
	$msgError="el id del inventario es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_inventarios.php');
		</script>";	
}
else{

		$borrar_inventario= new Inventario();

		$mensaje=$borrar_inventario->Borrar($id_inventario);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_inventarios.php');
		</script>";		 
	} 



?>