<?php
include("../../modelos/grupos.php");

$grupo=$_POST['grupo'];
$prioridad=$_POST['prioridad'];
$id_grupo=$_POST['id_grupo'];

if((empty($grupo) || strlen($grupo)<4) ||(empty($prioridad)) || (empty($id_grupo))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_grupo= new Grupos();

		$mensaje=$actualizar_grupo->actualizar($id_grupo,$grupo,$prioridad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/grupos/listar.php');
		</script>";		 
	} 



?>