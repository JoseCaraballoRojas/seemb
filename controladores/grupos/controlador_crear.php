<?php
include("../../modelos/grupos.php");

$grupo=$_POST['grupo'];
$prioridad=$_POST['prioridad'];


if((empty($grupo) || strlen($grupo)<4) ||(empty($prioridad))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$crear_grupo= new Grupos();

		$mensaje=$crear_grupo->crear($grupo,$prioridad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/grupos/listar.php');
		</script>";		 
	} 



?>