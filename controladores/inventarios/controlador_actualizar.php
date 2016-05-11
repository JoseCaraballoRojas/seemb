<?php
//se incluye la clase Inevntario
include_once("../../modelos/Inventario.php");

$id_inventario=$_POST['id_inventario'];
$cantidad=$_POST['cantidad'];
$nivel_optimo=$_POST['nivel_optimo'];


if((empty($cantidad)) || (empty($nivel_optimo)) || (empty($id_inventario))  ){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_inventario= new Inventario();

		$mensaje=$actualizar_inventario->Actualizar($id_inventario,$cantidad,$nivel_optimo);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_inventarios.php');
		</script>";		 
	} 



?>