<?php
include("../../modelos/grupos.php");

$id_grupo=$_GET['id_grupo'];

if((empty($id_grupo) || strlen($id_grupo)<1) ){
	$msgError="el id  del grupo es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/grupos/listar.php');
		</script>";	
}
else{

		$borrar_grupo= new Grupos();

		$mensaje=$borrar_grupo->borrar($id_grupo);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/grupos/listar.php');
		</script>";		 
	} 



?>