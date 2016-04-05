<?php
include("../../modelos/Grupo.php");

$id_grupo=$_GET['id_grupo'];

if((empty($id_grupo) || strlen($id_grupo)<1) ){
	$msgError="el id  del grupo es incorrecto";
	echo "<script  type='text/javascript' charset='utf-8' >alert('$msgError');
		window.location.assign('../../vistas/vista_listar_grupos.php');
		</script>";	
}
else{

		$borrar_grupo= new Grupo();

		$mensaje=$borrar_grupo->Borrar($id_grupo);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_grupos.php');
		</script>";		 
	} 



?>