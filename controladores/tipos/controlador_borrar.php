<?php
include("../../modelos/Tipo.php");

$id_tipo=$_GET['id_tipo'];

if((empty($id_tipo)) || (strlen($id_tipo)<1) ){
	$msgError="el id  del tipo de plato es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_tipos.php');
		</script>";	
}
else{

		$borrar_tipo= new Tipo();

		$mensaje=$borrar_tipo->Borrar($id_tipo);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_tipos.php');
		</script>";		 
	} 



?>