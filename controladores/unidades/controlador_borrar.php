<?php
include("../../modelos/Unidad.php");

$id_unidad=$_GET['id_unidad'];

if((empty($id_unidad)) || (strlen($id_unidad)<1) ){
	$msgError="el id  de la unidad es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_unidades.php');
		</script>";	
}
else{

		$borrar_unidad= new Unidad();

		$mensaje=$borrar_unidad->Borrar($id_unidad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_unidades.php');
		</script>";		 
	} 



?>