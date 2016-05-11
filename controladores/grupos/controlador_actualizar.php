<?php
include("../../modelos/Grupo.php");

$grupo=ucfirst($_POST['grupo']);
$prioridad=$_POST['prioridad'];
$id_grupo=$_POST['id_grupo'];

if((empty($grupo) || strlen($grupo)<4) ||(empty($prioridad)) || (empty($id_grupo))){
	$msgError="todos los campos son obligatorios";
	echo $msgError;
}
else{

		$actualizar_grupo= new Grupo();

		$mensaje=$actualizar_grupo->Actualizar($id_grupo,$grupo,$prioridad);
		echo "<script  type='text/javascript' charset='utf-8' >alert('$mensaje');
		window.location.assign('../../vistas/vista_listar_grupos.php');
		</script>";		 
	} 



?>