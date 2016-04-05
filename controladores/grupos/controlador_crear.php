<?php
include("../../modelos/Grupo.php");

$grupo=$_POST['grupo'];
$prioridad=$_POST['prioridad'];


if((empty($grupo) || strlen($grupo)<4) ||(empty($prioridad))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_grupo= new Grupo();

		$mensaje=$crear_grupo->Crear($grupo,$prioridad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_grupos.php');
		</script>";		 
	} 



?>